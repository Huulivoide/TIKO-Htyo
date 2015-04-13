<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

/**
 * Meeting Entity.
 */
class Meeting extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'date' => true,
        'group_id' => true,
        'tutor_id' => true,
        'report' => true,
        'group' => true,
        'user' => true,
        'students' => true,
    ];

    /**
     * Get the total amount of students that should have
     * attended this meeting.
     *
     * @return int
     */
    public function _getTotalStudents()
    {
        $students = null;
        if ($this->has('students'))
        {
            $students = $this->studens;
        }
        else
        {
            $students = TableRegistry::get('MeetingsStudents')->find('all', [
                'conditions' => ['meeting_id' => $this->id]
            ])->toArray();
        }

        return count($students);
    }

    /**
     * Get the total amount of students that where absent from the meeting.
     *
     * @return int
     */
    public function _getAbsentStudents()
    {
        $students = null;
        if ($this->has('students'))
        {
            $students = $this->studens;
        }
        else
        {
            $students = TableRegistry::get('MeetingsStudents')->find('all', [
                'conditions' => [
                    'meeting_id' => $this->id,
                    'away_reason <>' => '']
            ])->toArray();
        }

        return count($students);
    }

    /**
     * Was this a private meeting between a individual student and tutor?
     *
     * @return bool
     */
    public function _getIsPrivateMeeting()
    {
        if ($this->_getTotalStudents() == 1)
            return true;

        return false;
    }

    /**
     * Was this a group meeting between the group and it's tutor?
     *
     * @return bool
     */
    public function _getIsGroupMeeting()
    {
        if ($this->_getTotalStudents() > 1)
            return true;

        return false;
    }
}
