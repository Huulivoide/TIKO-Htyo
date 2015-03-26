<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Meetings Controller
 *
 * @property \App\Model\Table\MeetingsTable $Meetings
 */
class MeetingsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Groups', 'Users']
        ];
        $this->set('meetings', $this->paginate($this->Meetings));
        $this->set('_serialize', ['meetings']);
    }

    /**
     * View method
     *
     * @param string|null $id Meeting id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $meeting = $this->Meetings->get($id, [
            'contain' => ['Groups', 'Users', 'Students']
        ]);
        $this->set('meeting', $meeting);
        $this->set('_serialize', ['meeting']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $meeting = $this->Meetings->newEntity();
        if ($this->request->is('post')) {
            $meeting = $this->Meetings->patchEntity($meeting, $this->request->data);
            if ($this->Meetings->save($meeting)) {
                $this->Flash->success('The meeting has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The meeting could not be saved. Please, try again.');
            }
        }
        $groups = $this->Meetings->Groups->find('list', ['limit' => 200]);
        $users = $this->Meetings->Users->find('list', ['limit' => 200]);
        $students = $this->Meetings->Students->find('list', ['limit' => 200]);
        $this->set(compact('meeting', 'groups', 'users', 'students'));
        $this->set('_serialize', ['meeting']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Meeting id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $meeting = $this->Meetings->get($id, [
            'contain' => ['Students']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $meeting = $this->Meetings->patchEntity($meeting, $this->request->data);
            if ($this->Meetings->save($meeting)) {
                $this->Flash->success('The meeting has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The meeting could not be saved. Please, try again.');
            }
        }
        $groups = $this->Meetings->Groups->find('list', ['limit' => 200]);
        $users = $this->Meetings->Users->find('list', ['limit' => 200]);
        $students = $this->Meetings->Students->find('list', ['limit' => 200]);
        $this->set(compact('meeting', 'groups', 'users', 'students'));
        $this->set('_serialize', ['meeting']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Meeting id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $meeting = $this->Meetings->get($id);
        if ($this->Meetings->delete($meeting)) {
            $this->Flash->success('The meeting has been deleted.');
        } else {
            $this->Flash->error('The meeting could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}