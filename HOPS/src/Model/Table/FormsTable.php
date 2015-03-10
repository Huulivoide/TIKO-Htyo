<?php
namespace App\Model\Table;

use App\Model\Entity\Form;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Forms Model
 */
class FormsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('forms');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo('Students', [
            'foreignKey' => 'student_id'
        ]);
        $this->hasMany('CoursesStudents', [
            'foreignKey' => 'form_id'
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
            ->add('student_id', 'valid', ['rule' => 'numeric'])
            ->requirePresence('student_id', 'create')
            ->notEmpty('student_id')
            ->requirePresence('time', 'create')
            ->notEmpty('time')
            ->add('works', 'valid', ['rule' => 'boolean'])
            ->requirePresence('works', 'create')
            ->notEmpty('works')
            ->add('weekly_hours', 'valid', ['rule' => 'numeric'])
            ->requirePresence('weekly_hours', 'create')
            ->notEmpty('weekly_hours')
            ->requirePresence('working_reason', 'create')
            ->notEmpty('working_reason')
            ->requirePresence('interest', 'create')
            ->notEmpty('interest')
            ->requirePresence('secondary_interest', 'create')
            ->notEmpty('secondary_interest')
            ->requirePresence('last_year_positive', 'create')
            ->notEmpty('last_year_positive')
            ->requirePresence('last_year_negative', 'create')
            ->notEmpty('last_year_negative');

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
        $rules->add($rules->existsIn(['student_id'], 'Students'));
        return $rules;
    }
}
