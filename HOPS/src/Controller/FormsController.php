<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\CoursesStudent;
use Cake\I18n\Time;

/**
 * Forms Controller
 *
 * @property \App\Model\Table\FormsTable $Forms
 */
class FormsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Students']
        ];
        $this->set('forms', $this->paginate($this->Forms));
        $this->set('_serialize', ['forms']);
    }

    /**
     * View method
     *
     * @param string|null $id Form id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $form = $this->Forms->get($id, [
            'contain' => ['Students', 'CoursesStudents']
        ]);
        $this->set('form', $form);
        $this->set('_serialize', ['form']);
    }

    private function processUnfinishedCourses($student)
    {
        if (isset($this->request->data['unfinished']))
        {
            // Fill in the finishing dates to unfinished courses
            foreach ($student->un_finished_courses as $course)
            {
                foreach ($this->request->data['unfinished'] as $key => $unfinished)
                {
                    if ($course->id == $unfinished['course_id'] && $unfinished['finishing_date'] != "")
                        $course->_joinData->finishing_date = Time::createFromFormat('d.m.Y', $unfinished['finishing_date'], 'Europe/Helsinki');

                    // So we don't have to iterate over it again
                    unset($this->request->data['unfinished'][$key]);
                }
            }
        }
    }

    private function processLastSemesterCourses($student)
    {
        if (isset($this->request->data['lastSemesterCourses']))
        {
            // Create new CoursesStudents links for courses that were nor included in last years HOPS,
            // but were completed by the student anyway
            foreach ($this->request->data['lastSemesterCourses'] as $course)
            {
                $newCourse = $this->Forms->Students->Courses->get($course['id']);
                $newCourse->_joinData = new CoursesStudent();
                $newCourse->_joinData->planned_finishing_date = Time::createFromTimestampUTC(0);
                $newCourse->_joinData->finishing_date = Time::createFromFormat('d.m.Y', $course['date'], 'Europe/Helsinki');

                $student->courses[] = $newCourse;
            }
        }
    }

    private function getCurrentSemesterStartYear()
    {
        $currentYear = Time::Now()->year;
        $currentYearStartDate = new Time("$currentYear-09-01 00:00");
        if ($currentYearStartDate->isFuture())
            $currentYear -= 1; //We are currently in spring semester, calculate from autumn instead

        return $currentYear;
    }

    private function processSemesterCourses($student, $key, $finishingDate, $plannedDate)
    {
        if (isset($this->request->data[$key]))
        {
            foreach ($this->request->data[$key] as $course)
            {
                $newCourse = $this->Forms->Students->Courses->get($course['id']);
                $newCourse->_joinData = new CoursesStudent();
                $newCourse->_joinData->planned_finishing_date = $plannedDate;
                $newCourse->_joinData->finishing_date = $finishingDate;

                $student->courses[] = $newCourse;
            }
        }
    }

    private function processCourses($student)
    {
        // Last year planned courses
        $this->processUnfinishedCourses($student);

        // Last year unplanned courses
        $this->processLastSemesterCourses($student);

        // Autumn semester
        $currentYear = $this->getCurrentSemesterStartYear();
        $this->processSemesterCourses($student, 'thisAutumnCourses', null,
            Time::createFromDate($currentYear, 12, 31, "Europe/Helsinki"));

        // Spring semester
        $currentYear = $this->getCurrentSemesterStartYear();
        $this->processSemesterCourses($student, 'thisSpringCourses', null,
            Time::createFromDate($currentYear + 1, 6, 30, "Europe/Helsinki"));
    }


    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $form = $this->Forms->newEntity();

        $student = $this->Forms->Students->get($this->Auth->user('id'), ['contain' => ['Users', 'UnFinishedCourses']]);
        $student->courses = [];

        if ($this->request->is('post'))
        {
            $this->processCourses($student);

            if ($this->request->data['works'] == 1)
                $this->request->data['works'] = true;
            else
                $this->request->data['works'] = false;

            $form = $this->Forms->patchEntity($form, $this->request->data);
            $form->student = $student;
            $form->student_id = $student->user_id;
            $form->time = Time::now();

            if ($this->Forms->save($form))
            {
                $this->Flash->success('The form has been saved.');
                return $this->redirect(['action' => 'index']);
            }
            else
            {
                $this->Flash->error('The form could not be saved. Please, try again.');
            }
        }

        $currentYear = $this->getCurrentSemesterStartYear();
        $currentSemester = $currentYear . '–' . ($currentYear + 1);
        $lastSemester = ($currentYear - 1) . '–' . $currentYear;

        $this->set(compact('form', 'student', 'currentSemester', 'lastSemester'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Form id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $form = $this->Forms->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $form = $this->Forms->patchEntity($form, $this->request->data);
            if ($this->Forms->save($form)) {
                $this->Flash->success('The form has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The form could not be saved. Please, try again.');
            }
        }
        $students = $this->Forms->Students->find('list', ['limit' => 200]);
        $this->set(compact('form', 'students'));
        $this->set('_serialize', ['form']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Form id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $form = $this->Forms->get($id);
        if ($this->Forms->delete($form)) {
            $this->Flash->success('The form has been deleted.');
        } else {
            $this->Flash->error('The form could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
