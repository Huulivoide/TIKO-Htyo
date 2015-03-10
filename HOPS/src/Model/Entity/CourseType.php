<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CourseType Entity.
 */
class CourseType extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'program_requirements' => true,
        'courses' => true,
    ];
}
