<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Course Entity.
 */
class Course extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'year' => true,
        'credits' => true,
        'course_types' => true,
        'program_structures' => true,
        'students' => true,
    ];
}
