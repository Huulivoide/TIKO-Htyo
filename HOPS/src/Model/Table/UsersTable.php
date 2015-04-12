<?php
namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 */
class UsersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('users');
        $this->displayField('name');
        $this->primaryKey('id');
        $this->belongsTo('AccessLevels', [
            'foreignKey' => 'access_level_id'
        ]);
        $this->hasMany('Meetings', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Students', [
            'foreignKey' => 'user_id',
            'conditions' => ['access_level_id' => 1]
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
            ->requirePresence('login', 'create')
            ->notEmpty('login')
            ->requirePresence('password', 'create')
            ->notEmpty('password')
            ->add('access_level_id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('access_level_id')
            ->requirePresence('phone', 'create')
            ->notEmpty('phone')
            ->add('email', 'valid', ['rule' => 'email'])
            ->requirePresence('email', 'create')
            ->notEmpty('email')
            ->requirePresence('first_name', 'create')
            ->notEmpty('first_name')
            ->allowEmpty('other_name')
            ->requirePresence('last_name', 'create')
            ->notEmpty('last_name');

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
        $rules->add($rules->isUnique(['login']));
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['access_level_id'], 'AccessLevels'));
        return $rules;
    }

    public function findTutors(Query $query, array $options)
    {
        return $query->where(['access_level_id' => 2]);
    }
}
