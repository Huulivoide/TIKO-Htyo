<?php
namespace App\Model\Table;

use App\Model\Entity\ProgramStructure;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProgramStructures Model
 */
class ProgramStructuresTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('program_structures');
        $this->displayField('name');
        $this->primaryKey('id');
        $this->hasMany('ProgramRequirements', [
            'foreignKey' => 'program_structure_id'
        ]);
        $this->hasMany('Students', [
            'foreignKey' => 'program_structure_id'
        ]);
        $this->belongsToMany('Courses', [
            'foreignKey' => 'program_structure_id',
            'targetForeignKey' => 'course_id',
            'joinTable' => 'courses_program_structures'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create')
            ->requirePresence('name', 'create')
            ->notEmpty('name')
            ->add('year', 'valid', ['rule' => 'numeric'])
            ->requirePresence('year', 'create')
            ->notEmpty('year');

        return $validator;
    }
}
