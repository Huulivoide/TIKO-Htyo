<?php
namespace App\Model\Entity;

use Cake\I18n\Time;
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

    public function isAutumnCourse()
    {
        $year = $this->planned_finishing_date->year;
        $autumnSemesterEndDate = new Time("$year-12-30 23:59");

        return $autumnSemesterEndDate->lt($this->planned_finishing_date);
    }

    public function _getPlannedSemester()
    {
        $year = $this->planned_finishing_date->year;

        $autumnSemesterEndDate = new Time("$year-12-30 23:59");

        if ($this->planned_finishing_date->eq(Time::createFromTimestampUTC(0)))
            return __('Ei ole ollut osa HOPS:ia');
        else if ($autumnSemesterEndDate->lt($this->planned_finishing_date))
            return $year . ' ' . __('(syksy)');
        else
            return $year . ' ' . __('(kevät)');
    }

    public function _getFinishedSemester()
    {
        $year = $this->finishing_date->year;

        $autumnSemesterEndDate = new Time("$year-12-30 23:59");

        if ($autumnSemesterEndDate->lt($this->finishing_date))
            return $year . ' ' . __('(syksy)');
        else
            return $year . ' ' . __('(kevät)');
    }
}
