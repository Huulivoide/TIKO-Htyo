<?php
namespace App\Model\Table;

use App\Model\Entity\MeetingsStudent;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MeetingsStudents Model
 */
class MeetingsStudentsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('meetings_students');
        $this->displayField('student_id');
        $this->primaryKey(['student_id', 'meeting_id']);
        $this->belongsTo('Students', [
            'foreignKey' => 'student_id'
        ]);
        $this->belongsTo('Meetings', [
            'foreignKey' => 'meeting_id'
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
            ->add('student_id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('student_id', 'create')
            ->add('meeting_id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('meeting_id', 'create');

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
        $rules->add($rules->existsIn(['meeting_id'], 'Meetings'));
        return $rules;
    }
}
