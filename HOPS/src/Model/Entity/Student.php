<?php
namespace App\Model\Entity;

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
}
