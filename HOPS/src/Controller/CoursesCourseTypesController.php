<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CoursesCourseTypes Controller
 *
 * @property \App\Model\Table\CoursesCourseTypesTable $CoursesCourseTypes
 */
class CoursesCourseTypesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Courses', 'CourseTypes']
        ];
        $this->set('coursesCourseTypes', $this->paginate($this->CoursesCourseTypes));
        $this->set('_serialize', ['coursesCourseTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Courses Course Type id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $coursesCourseType = $this->CoursesCourseTypes->get($id, [
            'contain' => ['Courses', 'CourseTypes']
        ]);
        $this->set('coursesCourseType', $coursesCourseType);
        $this->set('_serialize', ['coursesCourseType']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $coursesCourseType = $this->CoursesCourseTypes->newEntity();
        if ($this->request->is('post')) {
            $coursesCourseType = $this->CoursesCourseTypes->patchEntity($coursesCourseType, $this->request->data);
            if ($this->CoursesCourseTypes->save($coursesCourseType)) {
                $this->Flash->success('The courses course type has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The courses course type could not be saved. Please, try again.');
            }
        }
        $courses = $this->CoursesCourseTypes->Courses->find('list', ['limit' => 200]);
        $courseTypes = $this->CoursesCourseTypes->CourseTypes->find('list', ['limit' => 200]);
        $this->set(compact('coursesCourseType', 'courses', 'courseTypes'));
        $this->set('_serialize', ['coursesCourseType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Courses Course Type id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $coursesCourseType = $this->CoursesCourseTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $coursesCourseType = $this->CoursesCourseTypes->patchEntity($coursesCourseType, $this->request->data);
            if ($this->CoursesCourseTypes->save($coursesCourseType)) {
                $this->Flash->success('The courses course type has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The courses course type could not be saved. Please, try again.');
            }
        }
        $courses = $this->CoursesCourseTypes->Courses->find('list', ['limit' => 200]);
        $courseTypes = $this->CoursesCourseTypes->CourseTypes->find('list', ['limit' => 200]);
        $this->set(compact('coursesCourseType', 'courses', 'courseTypes'));
        $this->set('_serialize', ['coursesCourseType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Courses Course Type id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $coursesCourseType = $this->CoursesCourseTypes->get($id);
        if ($this->CoursesCourseTypes->delete($coursesCourseType)) {
            $this->Flash->success('The courses course type has been deleted.');
        } else {
            $this->Flash->error('The courses course type could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
