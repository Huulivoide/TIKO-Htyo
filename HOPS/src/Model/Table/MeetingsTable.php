<?php
namespace App\Model\Table;

use App\Model\Entity\Meeting;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Meetings Model
 */
class MeetingsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('meetings');
        $this->displayField('id');
        $this->primaryKey('id');
        $this->belongsTo('Groups', [
            'foreignKey' => 'group_id'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'tutor_id',
            'propertyName' => 'tutor'
        ]);
        $this->belongsToMany('Students', [
            'foreignKey' => 'meeting_id',
            'targetForeignKey' => 'student_id',
            'joinTable' => 'meetings_students'
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
            ->add('date', 'valid', ['rule' => 'date'])
            ->requirePresence('date', 'create')
            ->notEmpty('date')
            ->add('group_id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('group_id')
            ->add('tutor_id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('tutor_id')
            ->requirePresence('report', 'create')
            ->notEmpty('report');

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
        $rules->add($rules->existsIn(['group_id'], 'Groups'));
        $rules->add($rules->existsIn(['tutor_id'], 'Users'));
        return $rules;
    }
}
