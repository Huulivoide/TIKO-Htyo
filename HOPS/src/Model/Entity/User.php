<?php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

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

    protected function _getName()
    {
        $name = $this->_properties['first_name'];

        $second_name = $this->_properties['other_name'];
        if ($second_name !== null)
            $name .= " " . $second_name;

        $name .= " " . $this->_properties['last_name'];

        return $name;
    }

    public function _setPassword($password)
    {
        return (new DefaultPasswordHasher)->hash($password);
    }
    
    public function _getNumOfTutored()
    {
        $students = TableRegistry::get('Students');
        
        $num = $students->find('all', [
            'conditions' => ['tutor_id' => $this->id],
        ]);
        
        return $num->count();
    }
}
