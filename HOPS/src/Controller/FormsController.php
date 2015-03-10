<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Forms Controller
 *
 * @property \App\Model\Table\FormsTable $Forms
 */
class FormsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Students']
        ];
        $this->set('forms', $this->paginate($this->Forms));
        $this->set('_serialize', ['forms']);
    }

    /**
     * View method
     *
     * @param string|null $id Form id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $form = $this->Forms->get($id, [
            'contain' => ['Students', 'CoursesStudents']
        ]);
        $this->set('form', $form);
        $this->set('_serialize', ['form']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $form = $this->Forms->newEntity();
        if ($this->request->is('post')) {
            $form = $this->Forms->patchEntity($form, $this->request->data);
            if ($this->Forms->save($form)) {
                $this->Flash->success('The form has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The form could not be saved. Please, try again.');
            }
        }
        $students = $this->Forms->Students->find('list', ['limit' => 200]);
        $this->set(compact('form', 'students'));
        $this->set('_serialize', ['form']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Form id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $form = $this->Forms->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $form = $this->Forms->patchEntity($form, $this->request->data);
            if ($this->Forms->save($form)) {
                $this->Flash->success('The form has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The form could not be saved. Please, try again.');
            }
        }
        $students = $this->Forms->Students->find('list', ['limit' => 200]);
        $this->set(compact('form', 'students'));
        $this->set('_serialize', ['form']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Form id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $form = $this->Forms->get($id);
        if ($this->Forms->delete($form)) {
            $this->Flash->success('The form has been deleted.');
        } else {
            $this->Flash->error('The form could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
