<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProgramStructure Entity.
 */
class ProgramStructure extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'year' => true,
        'program_requirements' => true,
        'students' => true,
        'courses' => true,
    ];
}
