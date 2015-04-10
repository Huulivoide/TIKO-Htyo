<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MeetingsStudent Entity.
 */
class MeetingsStudent extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'student' => true,
        'meeting' => true,
        'away_reason' => true
    ];
}
