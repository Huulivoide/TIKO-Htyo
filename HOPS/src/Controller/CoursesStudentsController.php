<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CoursesStudents Controller
 *
 * @property \App\Model\Table\CoursesStudentsTable $CoursesStudents
 */
class CoursesStudentsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Courses', 'Forms', 'Students']
        ];
        $this->set('coursesStudents', $this->paginate($this->CoursesStudents));
        $this->set('_serialize', ['coursesStudents']);
    }

    /**
     * View method
     *
     * @param string|null $id Courses Student id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $coursesStudent = $this->CoursesStudents->get($id, [
            'contain' => ['Courses', 'Forms', 'Students']
        ]);
        $this->set('coursesStudent', $coursesStudent);
        $this->set('_serialize', ['coursesStudent']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $coursesStudent = $this->CoursesStudents->newEntity();
        if ($this->request->is('post')) {
            $coursesStudent = $this->CoursesStudents->patchEntity($coursesStudent, $this->request->data);
            if ($this->CoursesStudents->save($coursesStudent)) {
                $this->Flash->success('The courses student has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The courses student could not be saved. Please, try again.');
            }
        }
        $courses = $this->CoursesStudents->Courses->find('list', ['limit' => 200]);
        $forms = $this->CoursesStudents->Forms->find('list', ['limit' => 200]);
        $students = $this->CoursesStudents->Students->find('list', ['limit' => 200]);
        $this->set(compact('coursesStudent', 'courses', 'forms', 'students'));
        $this->set('_serialize', ['coursesStudent']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Courses Student id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $coursesStudent = $this->CoursesStudents->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $coursesStudent = $this->CoursesStudents->patchEntity($coursesStudent, $this->request->data);
            if ($this->CoursesStudents->save($coursesStudent)) {
                $this->Flash->success('The courses student has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The courses student could not be saved. Please, try again.');
            }
        }
        $courses = $this->CoursesStudents->Courses->find('list', ['limit' => 200]);
        $forms = $this->CoursesStudents->Forms->find('list', ['limit' => 200]);
        $students = $this->CoursesStudents->Students->find('list', ['limit' => 200]);
        $this->set(compact('coursesStudent', 'courses', 'forms', 'students'));
        $this->set('_serialize', ['coursesStudent']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Courses Student id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $coursesStudent = $this->CoursesStudents->get($id);
        if ($this->CoursesStudents->delete($coursesStudent)) {
            $this->Flash->success('The courses student has been deleted.');
        } else {
            $this->Flash->error('The courses student could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
