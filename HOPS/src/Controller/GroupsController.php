<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Groups Controller
 *
 * @property \App\Model\Table\GroupsTable $Groups
 */
class GroupsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Tutors']
        ];
        $this->set('groups', $this->paginate($this->Groups));
        $this->set('_serialize', ['groups']);
    }

    /**
     * View method
     *
     * @param string|null $id Group id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $group = $this->Groups->get($id, ['contain' => ['Tutors', 'Meetings', 'ProgramStructures']]);
        $students = $this->Groups->Students->find('all', [
            'conditions' => ['group_id' => $id],
            'contain' => ['Users', 'Tutors', 'Meetings']
        ]);
        $this->set(compact('group', 'students'));
        $this->set('_serialize', ['group']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $group = $this->Groups->newEntity(null, ['associated' => 'Students']);

        if ($this->request->is('post')) {
            // input(type=year) seems to output date array instead of raw number. Fix it
            $this->request->data['year'] = $this->request->data['year']['year'];

            // Don't create new students. (This should not be needed, there is a bug somewhere)
            // Could be due to using students[x] syntax in inputs instead of _ids. Javasctipt
            // and array should do it, but leave it for now.
            // Also set the tutor of each student to that one of the group's
            $students = [];
            foreach ($this->request->data['students'] as $student)
            {
                $student['tutor_id'] = $this->request->data['tutor_id'];
                $students[] = $this->Groups->Students->get($student['user_id']);
            }
            unset($this->request->data['students']);

            $group = $this->Groups->patchEntity($group, $this->request->data);
            $group->identifier = 1;
            $group->students = $students;

            debug($this->request->data);
            if ($this->Groups->save($group)) {
                $this->Flash->success('The group has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The group could not be saved. Please, try again.');
            }
        }
        $tutors = $this->Groups->Tutors->find('list', [
            'conditions' => ['access_level_id' => 2]
        ]);
        $students = $this->Groups->Students->find('all', [
            'contain' => ['ProgramStructures', 'Users'],
            'conditions' => ['group_id IS NULL']
        ]);
        $programs = $this->Groups->ProgramStructures->find('list');
        $this->set(compact('group', 'tutors', 'students', 'programs'));
        $this->set('_serialize', ['group']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Group id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $group = $this->Groups->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $group = $this->Groups->patchEntity($group, $this->request->data);
            if ($this->Groups->save($group)) {
                $this->Flash->success('The group has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The group could not be saved. Please, try again.');
            }
        }
        $tutors = $this->Groups->Tutors->find('list', ['limit' => 200]);
        $this->set(compact('group', 'tutors'));
        $this->set('_serialize', ['group']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Group id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $group = $this->Groups->get($id);
        if ($this->Groups->delete($group)) {
            $this->Flash->success('The group has been deleted.');
        } else {
            $this->Flash->error('The group could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
