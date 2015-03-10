<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Meeting Entity.
 */
class Meeting extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'date' => true,
        'group_id' => true,
        'user_id' => true,
        'report' => true,
        'group' => true,
        'user' => true,
        'students' => true,
    ];
}
