<?php
namespace App\Model\Table;

use App\Model\Entity\CoursesStudent;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CoursesStudents Model
 */
class CoursesStudentsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('courses_students');
        $this->displayField('course_id');
        $this->primaryKey(['course_id', 'student_id']);
        $this->belongsTo('Courses', [
            'foreignKey' => 'course_id'
        ]);
        $this->belongsTo('Forms', [
            'foreignKey' => 'form_id'
        ]);
        $this->belongsTo('Students', [
            'foreignKey' => 'student_id'
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
            ->add('course_id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('course_id', 'create')
            ->add('form_id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('form_id')
            ->add('student_id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('student_id', 'create')
            ->add('planned_finishing_date', 'valid', ['rule' => 'date'])
            ->requirePresence('planned_finishing_date', 'create')
            ->notEmpty('planned_finishing_date')
            ->add('finishing_date', 'valid', ['rule' => 'date'])
            ->requirePresence('finishing_date', 'create')
            ->notEmpty('finishing_date');

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
        $rules->add($rules->existsIn(['course_id'], 'Courses'));
        $rules->add($rules->existsIn(['form_id'], 'Forms'));
        $rules->add($rules->existsIn(['student_id'], 'Students'));
        return $rules;
    }
}
