<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

/**
 * Group Entity.
 */
class Group extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'tutor_id' => true,
        'tutor' => true,
        'program_structure_id' => true,
        'program_structure' => true,
        'year' => true,
        'identifier' => true,
        'meetings' => true,
        'students' => true,
    ];

    public function _getName()
    {
        $program_structure = null;

        if ($this->has('program_structure'))
            $program_structure = $this->program_structure;
        else
            $program_structure = TableRegistry::get('ProgramStructures')->get($this->program_structure_id);

        return __('Vuoden {0} {1}:n tuutorointiryhmä {2}', $this->year, $program_structure->name, $this->identifier);
    }
}
