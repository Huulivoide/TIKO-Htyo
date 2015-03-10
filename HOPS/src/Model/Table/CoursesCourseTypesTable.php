<?php
namespace App\Model\Table;

use App\Model\Entity\CoursesCourseType;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CoursesCourseTypes Model
 */
class CoursesCourseTypesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('courses_course_types');
        $this->displayField('course_id');
        $this->primaryKey(['course_id', 'course_type_id']);
        $this->belongsTo('Courses', [
            'foreignKey' => 'course_id'
        ]);
        $this->belongsTo('CourseTypes', [
            'foreignKey' => 'course_type_id'
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
            ->add('course_type_id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('course_type_id', 'create');

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
        $rules->add($rules->existsIn(['course_type_id'], 'CourseTypes'));
        return $rules;
    }
}
