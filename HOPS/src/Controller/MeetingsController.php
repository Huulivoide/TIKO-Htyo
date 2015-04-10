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
    public function newGroupMeeting($group_id)
    {
        $meeting = $this->Meetings->newEntity();
        $group = $this->Meetings->Groups->get($group_id);

        //TODO: Check that the group is supervised by the tutor who is logged in.

        if ($this->request->is('post'))
        {
            $meeting = $this->Meetings->patchEntity($meeting, $this->request->data);
            $meeting->tutor_id = $group->tutor_id;

            if ($this->Meetings->save($meeting))
            {
                $this->Flash->success(__('Palaveriraportti on nyt tallennettu järjestelmään.'));
                return $this->redirect(['action' => 'index']);
            }
            else
            {
                $this->Flash->error(__('Palaveriraporttia tallennettaessa tapahtui virhe. Yritä uudelleen.'));
            }
        }

        $students = $this->Meetings->Students->find('all', ['contain' => 'Users',
                                                            'conditions' => ['group_id' => $group_id],
                                                            'order' => ['Users.first_name' => 'ASC',
                                                                        'Users.other_name' => 'ASC',
                                                                        'Users.last_name' => 'ASC']]);

        $this->set(compact('meeting', 'group', 'students'));
        $this->set('_serialize', ['meeting']);
    }

    /**
     * Report a new private meeting method
     *
     * @param int $student_id user_id of the participating student.
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function newPrivateMeeting($student_id)
    {
        $meeting = $this->Meetings->newEntity(null, ['associated' => ['Students']]);

        if ($this->request->is('post'))
        {
            $this->request->data['students'][0]['user_id'] = $student_id;
            $this->request->data['students'][0]['_joinData']['away_reason'] = "";

            $meeting = $this->Meetings->patchEntity($meeting, $this->request->data);

            // TODO: Fetch the tutor_id from the logged-in user
            // $tutor_id = $this->Auth->user('id');
            $tutor = $this->Meetings->Users->find('all', ['conditions' => ['Users.access_level_id' => 2]]);
            $meeting->tutor_id = $tutor->first()->id;

            if ($this->Meetings->save($meeting))
            {
                $this->Flash->success(__(''));
                return $this->redirect(['action' => 'index']);
            }
            else
            {
                $this->Flash->error('The meeting could not be saved. Please, try again.');
            }
        }

        $student = $this->Meetings->Students->Users->findById($student_id)->first();
        $this->set(compact('meeting', 'student'));
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
