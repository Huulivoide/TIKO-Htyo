<?php
namespace App\Model\Table;

use App\Model\Entity\ProgramRequirement;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ProgramRequirements Model
 */
class ProgramRequirementsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('program_requirements');
        $this->displayField('course_type_id');
        $this->primaryKey(['course_type_id', 'program_structure_id']);
        $this->belongsTo('CourseTypes', [
            'foreignKey' => 'course_type_id'
        ]);
        $this->belongsTo('ProgramStructures', [
            'foreignKey' => 'program_structure_id'
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
            ->add('course_type_id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('course_type_id', 'create')
            ->add('program_structure_id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('program_structure_id', 'create')
            ->add('credits', 'valid', ['rule' => 'numeric'])
            ->requirePresence('credits', 'create')
            ->notEmpty('credits');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['course_type_id'], 'CourseTypes'));
        $rules->add($rules->existsIn(['program_structure_id'], 'ProgramStructures'));
        return $rules;
    }
}
