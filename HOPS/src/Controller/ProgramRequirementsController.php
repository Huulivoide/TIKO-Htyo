<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProgramRequirements Controller
 *
 * @property \App\Model\Table\ProgramRequirementsTable $ProgramRequirements
 */
class ProgramRequirementsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['CourseTypes', 'ProgramStructures']
        ];
        $this->set('programRequirements', $this->paginate($this->ProgramRequirements));
        $this->set('_serialize', ['programRequirements']);
    }

    /**
     * View method
     *
     * @param string|null $id Program Requirement id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $programRequirement = $this->ProgramRequirements->get($id, [
            'contain' => ['CourseTypes', 'ProgramStructures']
        ]);
        $this->set('programRequirement', $programRequirement);
        $this->set('_serialize', ['programRequirement']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $programRequirement = $this->ProgramRequirements->newEntity();
        if ($this->request->is('post')) {
            $programRequirement = $this->ProgramRequirements->patchEntity($programRequirement, $this->request->data);
            if ($this->ProgramRequirements->save($programRequirement)) {
                $this->Flash->success('The program requirement has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The program requirement could not be saved. Please, try again.');
            }
        }
        $courseTypes = $this->ProgramRequirements->CourseTypes->find('list', ['limit' => 200]);
        $programStructures = $this->ProgramRequirements->ProgramStructures->find('list', ['limit' => 200]);
        $this->set(compact('programRequirement', 'courseTypes', 'programStructures'));
        $this->set('_serialize', ['programRequirement']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Program Requirement id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $programRequirement = $this->ProgramRequirements->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $programRequirement = $this->ProgramRequirements->patchEntity($programRequirement, $this->request->data);
            if ($this->ProgramRequirements->save($programRequirement)) {
                $this->Flash->success('The program requirement has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The program requirement could not be saved. Please, try again.');
            }
        }
        $courseTypes = $this->ProgramRequirements->CourseTypes->find('list', ['limit' => 200]);
        $programStructures = $this->ProgramRequirements->ProgramStructures->find('list', ['limit' => 200]);
        $this->set(compact('programRequirement', 'courseTypes', 'programStructures'));
        $this->set('_serialize', ['programRequirement']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Program Requirement id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $programRequirement = $this->ProgramRequirements->get($id);
        if ($this->ProgramRequirements->delete($programRequirement)) {
            $this->Flash->success('The program requirement has been deleted.');
        } else {
            $this->Flash->error('The program requirement could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
