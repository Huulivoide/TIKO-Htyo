<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MeetingsStudents Controller
 *
 * @property \App\Model\Table\MeetingsStudentsTable $MeetingsStudents
 */
class MeetingsStudentsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Students', 'Meetings']
        ];
        $this->set('meetingsStudents', $this->paginate($this->MeetingsStudents));
        $this->set('_serialize', ['meetingsStudents']);
    }

    /**
     * View method
     *
     * @param string|null $id Meetings Student id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $meetingsStudent = $this->MeetingsStudents->get($id, [
            'contain' => ['Students', 'Meetings']
        ]);
        $this->set('meetingsStudent', $meetingsStudent);
        $this->set('_serialize', ['meetingsStudent']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $meetingsStudent = $this->MeetingsStudents->newEntity();
        if ($this->request->is('post')) {
            $meetingsStudent = $this->MeetingsStudents->patchEntity($meetingsStudent, $this->request->data);
            if ($this->MeetingsStudents->save($meetingsStudent)) {
                $this->Flash->success('The meetings student has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The meetings student could not be saved. Please, try again.');
            }
        }
        $students = $this->MeetingsStudents->Students->find('list', ['limit' => 200]);
        $meetings = $this->MeetingsStudents->Meetings->find('list', ['limit' => 200]);
        $this->set(compact('meetingsStudent', 'students', 'meetings'));
        $this->set('_serialize', ['meetingsStudent']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Meetings Student id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $meetingsStudent = $this->MeetingsStudents->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $meetingsStudent = $this->MeetingsStudents->patchEntity($meetingsStudent, $this->request->data);
            if ($this->MeetingsStudents->save($meetingsStudent)) {
                $this->Flash->success('The meetings student has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The meetings student could not be saved. Please, try again.');
            }
        }
        $students = $this->MeetingsStudents->Students->find('list', ['limit' => 200]);
        $meetings = $this->MeetingsStudents->Meetings->find('list', ['limit' => 200]);
        $this->set(compact('meetingsStudent', 'students', 'meetings'));
        $this->set('_serialize', ['meetingsStudent']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Meetings Student id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $meetingsStudent = $this->MeetingsStudents->get($id);
        if ($this->MeetingsStudents->delete($meetingsStudent)) {
            $this->Flash->success('The meetings student has been deleted.');
        } else {
            $this->Flash->error('The meetings student could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
