<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AccessLevels Controller
 *
 * @property \App\Model\Table\AccessLevelsTable $AccessLevels
 */
class AccessLevelsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('accessLevels', $this->paginate($this->AccessLevels));
        $this->set('_serialize', ['accessLevels']);
    }

    /**
     * View method
     *
     * @param string|null $id Access Level id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $accessLevel = $this->AccessLevels->get($id, [
            'contain' => ['Users']
        ]);
        $this->set('accessLevel', $accessLevel);
        $this->set('_serialize', ['accessLevel']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $accessLevel = $this->AccessLevels->newEntity();
        if ($this->request->is('post')) {
            $accessLevel = $this->AccessLevels->patchEntity($accessLevel, $this->request->data);
            if ($this->AccessLevels->save($accessLevel)) {
                $this->Flash->success('The access level has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The access level could not be saved. Please, try again.');
            }
        }
        $this->set(compact('accessLevel'));
        $this->set('_serialize', ['accessLevel']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Access Level id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $accessLevel = $this->AccessLevels->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $accessLevel = $this->AccessLevels->patchEntity($accessLevel, $this->request->data);
            if ($this->AccessLevels->save($accessLevel)) {
                $this->Flash->success('The access level has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The access level could not be saved. Please, try again.');
            }
        }
        $this->set(compact('accessLevel'));
        $this->set('_serialize', ['accessLevel']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Access Level id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $accessLevel = $this->AccessLevels->get($id);
        if ($this->AccessLevels->delete($accessLevel)) {
            $this->Flash->success('The access level has been deleted.');
        } else {
            $this->Flash->error('The access level could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
