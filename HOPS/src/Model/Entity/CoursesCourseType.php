<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CoursesCourseType Entity.
 */
class CoursesCourseType extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'course' => true,
        'course_type' => true,
    ];
}
