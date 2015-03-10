<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProgramStructures Controller
 *
 * @property \App\Model\Table\ProgramStructuresTable $ProgramStructures
 */
class ProgramStructuresController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('programStructures', $this->paginate($this->ProgramStructures));
        $this->set('_serialize', ['programStructures']);
    }

    /**
     * View method
     *
     * @param string|null $id Program Structure id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $programStructure = $this->ProgramStructures->get($id, [
            'contain' => ['Courses', 'ProgramRequirements', 'Students']
        ]);
        $this->set('programStructure', $programStructure);
        $this->set('_serialize', ['programStructure']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $programStructure = $this->ProgramStructures->newEntity();
        if ($this->request->is('post')) {
            $programStructure = $this->ProgramStructures->patchEntity($programStructure, $this->request->data);
            if ($this->ProgramStructures->save($programStructure)) {
                $this->Flash->success('The program structure has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The program structure could not be saved. Please, try again.');
            }
        }
        $courses = $this->ProgramStructures->Courses->find('list', ['limit' => 200]);
        $this->set(compact('programStructure', 'courses'));
        $this->set('_serialize', ['programStructure']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Program Structure id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $programStructure = $this->ProgramStructures->get($id, [
            'contain' => ['Courses']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $programStructure = $this->ProgramStructures->patchEntity($programStructure, $this->request->data);
            if ($this->ProgramStructures->save($programStructure)) {
                $this->Flash->success('The program structure has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The program structure could not be saved. Please, try again.');
            }
        }
        $courses = $this->ProgramStructures->Courses->find('list', ['limit' => 200]);
        $this->set(compact('programStructure', 'courses'));
        $this->set('_serialize', ['programStructure']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Program Structure id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $programStructure = $this->ProgramStructures->get($id);
        if ($this->ProgramStructures->delete($programStructure)) {
            $this->Flash->success('The program structure has been deleted.');
        } else {
            $this->Flash->error('The program structure could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
