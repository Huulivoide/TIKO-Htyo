<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['AccessLevels']
        ];

        $this->set('users', $this->paginate($this->Users));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method for displaying tutor's information
     *
     * @param string|null $id User id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function viewTutor($id = null)
    {
        $tutor = $this->Users->get($id);
        $students = $this->Users->Students->find('all', [
            'conditions' => ['tutor_id' => $id],
            'contain' => ['Users', 'ProgramStructures'],
            'order' => ['Users.first_name' => 'DESC',
                        'Users.other_name' => 'DESC',
                        'Users.last_name' => 'DESC']
        ]);
        $groups = TableRegistry::get('Groups')->find('all', [
            'conditions' => ['tutor_id' => $id],
            'order' => [
                'Groups.year' => 'DESC',
                'Groups.identifier' => 'DESC']
        ]);

        $currentYear = Time::Now()->year;
        $currentYearStartDate = new Time("$currentYear-09-01 00:00");
        if ($currentYearStartDate->isFuture())
            $currentYear -= 1; //We are currently in spring semester, calculate from autumn instead

        $this->set(compact('tutor', 'students', 'groups', 'currentYear'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function addTutor()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post'))
        {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user))
            {
                $this->Flash->success('Tuutorikäyttäjä on tallennettu järjestelmään');
                return $this->redirect(['action' => 'index']);
            }
            else
            {
                $this->Flash->error('Tuutorikäyttäjää tallennettaessa tapahtui virhe.');
            }
        }

        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success('The user has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The user could not be saved. Please, try again.');
            }
        }
        $accessLevels = $this->Users->AccessLevels->find('list', ['limit' => 200]);
        $this->set(compact('user', 'accessLevels'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success('The user has been deleted.');
        } else {
            $this->Flash->error('The user could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }

    public function login()
    {
        if ($this->request->is('post'))
        {
            // If user doesn't exist at all redirect to "registering" page
            if ($this->Users->find('all', ['conditions' => ['login' => $this->request->data['login']]])->count() != 1)
                return $this->redirect(['controller' => 'Students', 'action' => 'add', $this->request->data['login']]);

            $user = $this->Auth->identify();
            if ($user)
            {
                $user['name'] = $this->Users->get($user['id'])->name;
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }

            $this->Flash->error(__('Käyttäjtunnus tai salasana oli väärin, yritä uudelleen.'));
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    /**
     * For listing tutors and the number of their tutorees
     *
     * @return void
     */
    public function listTutors()
    {
        $this->paginate = [
            'conditions' => ['access_level_id >' => 1],
            'contain' => ['AccessLevels']
        ];

        $this->set('users', $this->paginate($this->Users));
        $this->set('_serialize', ['users']);
    }
}
