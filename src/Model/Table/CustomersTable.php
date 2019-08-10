<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Auth\DefaultPasswordHasher;


class CustomersTable extends Table
{
   
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('customers');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
            'setDependent' => true
        ]);

        $this->addBehavior('Acl.Acl', ['type' => 'requester']);
    }


    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('nama_depan')
            ->maxLength('nama_depan', 255)
            ->requirePresence('nama_depan', 'create')
            ->notEmptyString('nama_depan');

        $validator
            ->scalar('nama_belakang')
            ->maxLength('nama_belakang', 255)
            ->requirePresence('nama_belakang', 'create')
            ->notEmptyString('nama_belakang');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');


        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }

    // public function beforeSave(\Cake\Event\Event $event, \Cake\ORM\Entity $entity, 
    //     \ArrayObject $options)
    // {
    //     $hasher = new DefaultPasswordHasher;
    //     $entity->password = $hasher->hash($entity->password);
    //     return true;
    // }
}
