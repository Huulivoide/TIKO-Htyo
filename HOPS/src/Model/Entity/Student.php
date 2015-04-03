<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

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
}
