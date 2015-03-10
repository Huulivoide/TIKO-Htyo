<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CoursesStudent Entity.
 */
class CoursesStudent extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'form_id' => true,
        'planned_finishing_date' => true,
        'finishing_date' => true,
        'course' => true,
        'form' => true,
        'student' => true,
    ];
}
