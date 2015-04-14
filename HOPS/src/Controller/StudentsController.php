<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Students Controller
 *
 * @property \App\Model\Table\StudentsTable $Students
 */
class StudentsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'ProgramStructures']
        ];
        $this->set('students', $this->paginate($this->Students));
        $this->set('_serialize', ['students']);
    }

    /**
     * View method
     *
     * @param string|null $id Student id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $student = $this->Students->get($id, [
            'contain' => ['Users', 'ProgramStructures', 'Forms']
        ]);
        $this->set('student', $student);
        $this->set('_serialize', ['student']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add($username, $password)
    {
        $student = $this->Students->newEntity();

        if ($this->request->is('post'))
        {
            // Patch the request data pass entry_year as a pure one value integer,
            // instead of a date array.
            $this->request->data['entry_year'] = $this->request->data['entry_year']['year'];

            $student = $this->Students->patchEntity($student, $this->request->data);
            $student->user->login = $username;
            $student->user->password = $password;
            $student->user->access_level = 1;

            debug($this->request->data);
            if ($this->Students->save($student))
            {
                $this->Flash->success('The student has been saved.');
                return $this->redirect(['action' => 'index']);
            }
            else
            {
                $this->Flash->error('The student could not be saved. Please, try again.');
            }
        }

      $programStructures = $this->Students->ProgramStructures->find('list', ['limit' => 200]);
      $this->set(compact('student', 'users', 'programStructures'));
      $this->set('_serialize', ['student']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Student id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $student = $this->Students->get($id, [
            'contain' => ['Courses', 'Meetings']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $student = $this->Students->patchEntity($student, $this->request->data);
            if ($this->Students->save($student)) {
                $this->Flash->success('The student has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The student could not be saved. Please, try again.');
            }
        }
        $users = $this->Students->Users->find('list', ['limit' => 200]);
        $tutors = $this->Students->Tutors->find('list', ['limit' => 200]);
        $programStructures = $this->Students->ProgramStructures->find('list', ['limit' => 200]);
        $groups = $this->Students->Groups->find('list', ['limit' => 200]);
        $courses = $this->Students->Courses->find('list', ['limit' => 200]);
        $meetings = $this->Students->Meetings->find('list', ['limit' => 200]);
        $this->set(compact('student', 'users', 'tutors', 'programStructures', 'groups', 'courses', 'meetings'));
        $this->set('_serialize', ['student']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Student id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $student = $this->Students->get($id);
        if ($this->Students->delete($student)) {
            $this->Flash->success('The student has been deleted.');
        } else {
            $this->Flash->error('The student could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
