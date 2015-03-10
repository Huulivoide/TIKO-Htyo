<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Form Entity.
 */
class Form extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'student_id' => true,
        'time' => true,
        'works' => true,
        'weekly_hours' => true,
        'working_reason' => true,
        'interest' => true,
        'secondary_interest' => true,
        'last_year_positive' => true,
        'last_year_negative' => true,
        'student' => true,
        'courses_students' => true,
    ];
}
