<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CoursesProgramStructure Entity.
 */
class CoursesProgramStructure extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'course' => true,
        'program_structure' => true,
    ];
}
