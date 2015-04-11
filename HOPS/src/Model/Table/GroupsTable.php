<?php
namespace App\Model\Table;

use App\Model\Entity\Group;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Groups Model
 */
class GroupsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('groups');
        $this->displayField('name');
        $this->primaryKey('id');
        $this->belongsTo('Tutors', [
            'className' => 'Users',
            'foreignKey' => 'tutor_id'
        ]);
        $this->belongsTo('ProgramStructures', [
            'foreignKey' => 'program_structure_id'
        ]);
        $this->hasMany('Meetings', [
            'foreignKey' => 'group_id'
        ]);
        $this->hasMany('Students', [
            'foreignKey' => 'group_id'
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
            ->add('tutor_id', 'valid', ['rule' => 'numeric'])
            ->requirePresence('tutor_id', 'create')
            ->notEmpty('tutor_id')
            ->add('program_structure_id', 'valid', ['rule' => 'numeric'])
            ->requirePresence('program_structure_id', true)
            ->notEmpty('program_structure_id')
            ->add('year', 'valid', ['rule' => 'numeric'])
            ->requirePresence('year', true)
            ->notEmpty('year')
            ->add('identifier', 'valid', ['rule' => 'numeric'])
            ->requirePresence('identifier', true)
            ->notEmpty('identifier');

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
        $rules->add($rules->existsIn(['tutor_id'], 'Tutors'));
        $rules->add($rules->existsIn(['program_structure_id'], 'ProgramStructures'));
        return $rules;
    }
}
