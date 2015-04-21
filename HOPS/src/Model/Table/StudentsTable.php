<?php
namespace App\Model\Table;

use App\Model\Entity\Student;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Students Model
 */
class StudentsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('students');
        $this->displayField('user_id');
        $this->primaryKey('user_id');
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsTo('Tutors', [
            'className' => 'Users',
            'foreignKey' => 'tutor_id'
        ]);
        $this->belongsTo('ProgramStructures', [
            'foreignKey' => 'program_structure_id'
        ]);
        $this->belongsTo('Groups', [
            'foreignKey' => 'group_id'
        ]);
        $this->hasMany('Forms', [
            'foreignKey' => 'student_id'
        ]);
        $this->belongsToMany('Courses', [
            'foreignKey' => 'student_id',
            'targetForeignKey' => 'course_id',
            'joinTable' => 'courses_students'
        ]);
        $this->belongsToMany('UnFinishedCourses', [
            'className' => 'Courses',
            'foreignKey' => 'student_id',
            'targetForeignKey' => 'course_id',
            'joinTable' => 'courses_students',
            'conditions' => ['finishing_date IS NULL']
        ]);
        $this->belongsToMany('Meetings', [
            'foreignKey' => 'student_id',
            'targetForeignKey' => 'meeting_id',
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
            ->add('user_id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('user_id', 'create')
            ->add('entry_year', 'valid', ['rule' => 'numeric'])
            ->requirePresence('entry_year', 'create')
            ->notEmpty('entry_year')
            ->add('tutor_id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('tutor_id')
            ->add('program_structure_id', 'valid', ['rule' => 'numeric'])
            ->requirePresence('program_structure_id', 'create')
            ->notEmpty('program_structure_id')
            ->add('group_id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('group_id');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['tutor_id'], 'Tutors'));
        $rules->add($rules->existsIn(['program_structure_id'], 'ProgramStructures'));
        $rules->add($rules->existsIn(['group_id'], 'Groups'));
        return $rules;
    }
}
