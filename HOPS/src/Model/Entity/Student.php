<?php
namespace App\Model\Entity;

use Cake\I18n\Time;
use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

/**
 * Student Entity.
 */
class Student extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'entry_year' => true,
        'tutor_id' => true,
        'program_structure_id' => true,
        'group_id' => true,
        'user' => true,
        'tutor' => true,
        'program_structure' => true,
        'group' => true,
        'forms' => true,
        'courses' => true,
        'meetings' => true,
    ];

    /**
     * Extract the student number form the login.
     */
    public function _getStudentNumber()
    {
        $user = "";
        if ($this->has('user'))
            $user = $this->user;
        else
            $user = TableRegistry::get('Users')->get($this->user_id);

        return substr($user->login, 2);
    }

    /**
     * Get list of private meetings the student has attended
     *
     * @return array
     */
    public function _getPrivateMeetings()
    {
        $meetings = [];
        foreach ($this->meetings as $meeting)
            if ($meeting->IsPrivateMeeting)
                $meetings[] = $meeting;

        return $meetings;
    }

    /**
     * Get list of all group meetings the student should have attended.
     *
     * @return array
     */
    public function _getGroupMeetings()
    {
        $meetings = [];
        foreach ($this->meetings as $meeting)
            if ($meeting->IsGroupMeeting)
                $meetings[] = $meeting;

        return $meetings;
    }

    /**
     * Get list of all group meetings the student should have attended,
     * but was absent for a reason or another.
     *
     * @return array
     */
    public function _getAbsentGroupMeetings()
    {
        $meetings = [];
        foreach ($this->meetings as $meeting)
            if ($meeting->IsGroupMeeting)
                if ($meeting->_joinData->away_reason !== '')
                    $meetings[] = $meeting;

        return $meetings;
    }

    public function _getNthYear()
    {
        $currentYear = Time::Now()->year;
        $currentYearStartDate = new Time("$currentYear-09-01 00:00");
        if ($currentYearStartDate->isFuture())
            $currentYear -= 1; //We are currently in spring semester, calculate from autumn instead


        return $currentYear - $this->entry_year + 1;
    }
}
