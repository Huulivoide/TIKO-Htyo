<?php
namespace App\Model\Entity;

use Cake\I18n\Time;
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

    public function _getSemester()
    {
        $currentYear = $this->time->year;
        $currentYearStartDate = new Time("$currentYear-09-01 00:00");
        if ($currentYearStartDate->isFuture())
            $currentYear -= 1; //We are currently in spring semester, calculate from autumn instead

        return $currentYear . '–' . ($currentYear + 1);
    }
}
