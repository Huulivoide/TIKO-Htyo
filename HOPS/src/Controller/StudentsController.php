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
            'contain' => ['Users', 'ProgramStructures', 'Tutors', 'Groups']
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
            'contain' => ['Users', 'ProgramStructures', 'Forms', 'Groups', 'Tutors']
        ]);
        $this->set('student', $student);
        $this->set('_serialize', ['student']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add($username)
    {
        $student = $this->Students->newEntity();

        if ($this->request->is('post'))
        {
            $data = $this->request->data;
            // Patch the request data pass entry_year as a pure one value integer,
            // instead of a date array.
            $data['entry_year'] = $data['entry_year']['year'];

            // Set access_level to student
            $data['user']['access_level_id'] = 1;

            // Set username
            $data['user']['login'] = $username;

            // Set password to (firstname + lastname)
            $data['user']['password'] = $data['user']['first_name'] . $data['user']['last_name'];

            $student = $this->Students->patchEntity($student, $data);
            debug($student);
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

    public function isAuthorized($user)
    {
        $allowed = ['add'];

        if ($this->Auth->user('access_level_id') == 1)
        {
            $id = $this->request->params['pass'][0];
            if ($id == $user['id'])
                $allowed[] = 'view';        
        }
        if ($this->Auth->user('access_level_id') >= 2) 
        {
            $allowed[] = 'view'; 
        }
        if ($this->Auth->user('access_level_id') >= 3)
        {
            $allowed[] = 'index';
        }

        if (in_array($this->request->param('action'), $allowed))
            return true;

        return false;
    }
}
