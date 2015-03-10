<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity.
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'login' => true,
        'password' => true,
        'access_level_id' => true,
        'phone' => true,
        'email' => true,
        'first_name' => true,
        'other_name' => true,
        'last_name' => true,
        'access_level' => true,
        'meetings' => true,
        'students' => true,
    ];
}
