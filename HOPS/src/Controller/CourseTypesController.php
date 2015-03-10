<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CourseTypes Controller
 *
 * @property \App\Model\Table\CourseTypesTable $CourseTypes
 */
class CourseTypesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('courseTypes', $this->paginate($this->CourseTypes));
        $this->set('_serialize', ['courseTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Course Type id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $courseType = $this->CourseTypes->get($id, [
            'contain' => ['Courses', 'ProgramRequirements']
        ]);
        $this->set('courseType', $courseType);
        $this->set('_serialize', ['courseType']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $courseType = $this->CourseTypes->newEntity();
        if ($this->request->is('post')) {
            $courseType = $this->CourseTypes->patchEntity($courseType, $this->request->data);
            if ($this->CourseTypes->save($courseType)) {
                $this->Flash->success('The course type has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The course type could not be saved. Please, try again.');
            }
        }
        $courses = $this->CourseTypes->Courses->find('list', ['limit' => 200]);
        $this->set(compact('courseType', 'courses'));
        $this->set('_serialize', ['courseType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Course Type id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $courseType = $this->CourseTypes->get($id, [
            'contain' => ['Courses']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $courseType = $this->CourseTypes->patchEntity($courseType, $this->request->data);
            if ($this->CourseTypes->save($courseType)) {
                $this->Flash->success('The course type has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The course type could not be saved. Please, try again.');
            }
        }
        $courses = $this->CourseTypes->Courses->find('list', ['limit' => 200]);
        $this->set(compact('courseType', 'courses'));
        $this->set('_serialize', ['courseType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Course Type id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $courseType = $this->CourseTypes->get($id);
        if ($this->CourseTypes->delete($courseType)) {
            $this->Flash->success('The course type has been deleted.');
        } else {
            $this->Flash->error('The course type could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
