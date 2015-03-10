<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CoursesProgramStructures Controller
 *
 * @property \App\Model\Table\CoursesProgramStructuresTable $CoursesProgramStructures
 */
class CoursesProgramStructuresController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Courses', 'ProgramStructures']
        ];
        $this->set('coursesProgramStructures', $this->paginate($this->CoursesProgramStructures));
        $this->set('_serialize', ['coursesProgramStructures']);
    }

    /**
     * View method
     *
     * @param string|null $id Courses Program Structure id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $coursesProgramStructure = $this->CoursesProgramStructures->get($id, [
            'contain' => ['Courses', 'ProgramStructures']
        ]);
        $this->set('coursesProgramStructure', $coursesProgramStructure);
        $this->set('_serialize', ['coursesProgramStructure']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $coursesProgramStructure = $this->CoursesProgramStructures->newEntity();
        if ($this->request->is('post')) {
            $coursesProgramStructure = $this->CoursesProgramStructures->patchEntity($coursesProgramStructure, $this->request->data);
            if ($this->CoursesProgramStructures->save($coursesProgramStructure)) {
                $this->Flash->success('The courses program structure has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The courses program structure could not be saved. Please, try again.');
            }
        }
        $courses = $this->CoursesProgramStructures->Courses->find('list', ['limit' => 200]);
        $programStructures = $this->CoursesProgramStructures->ProgramStructures->find('list', ['limit' => 200]);
        $this->set(compact('coursesProgramStructure', 'courses', 'programStructures'));
        $this->set('_serialize', ['coursesProgramStructure']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Courses Program Structure id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $coursesProgramStructure = $this->CoursesProgramStructures->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $coursesProgramStructure = $this->CoursesProgramStructures->patchEntity($coursesProgramStructure, $this->request->data);
            if ($this->CoursesProgramStructures->save($coursesProgramStructure)) {
                $this->Flash->success('The courses program structure has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The courses program structure could not be saved. Please, try again.');
            }
        }
        $courses = $this->CoursesProgramStructures->Courses->find('list', ['limit' => 200]);
        $programStructures = $this->CoursesProgramStructures->ProgramStructures->find('list', ['limit' => 200]);
        $this->set(compact('coursesProgramStructure', 'courses', 'programStructures'));
        $this->set('_serialize', ['coursesProgramStructure']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Courses Program Structure id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $coursesProgramStructure = $this->CoursesProgramStructures->get($id);
        if ($this->CoursesProgramStructures->delete($coursesProgramStructure)) {
            $this->Flash->success('The courses program structure has been deleted.');
        } else {
            $this->Flash->error('The courses program structure could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
