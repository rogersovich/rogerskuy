<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class OrdersTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('orders');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('OrderDetails', [
            'foreignKey' => 'order_id',
            'setDependent' => true
        ]);

        $this->belongsTo('Products', [
            'joinType' => 'INNER',
            'setDependent' => true
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
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->date('date')
            ->requirePresence('date', 'create')
            ->notEmptyDate('date');

        $validator
            ->integer('total_price')
            ->requirePresence('total_price', 'create')
            ->notEmptyString('total_price');

        $validator
            ->integer('paid')
            ->requirePresence('paid', 'create')
            ->notEmptyString('paid');

        $validator
            ->integer('change_money')
            ->requirePresence('change_money', 'create')
            ->notEmptyString('change_money');

        return $validator;
    }

    public function beforeSave(\Cake\Event\Event $event, \Cake\ORM\Entity $entity, \ArrayObject $options) {
        if ($entity->isNew()) {
            //dd('bisa dong');
            if (empty($entity->code)) {
                $formula = 'BR';
                //dd('bisa');
                $getLastCode = $this->find('all')
                ->select([
                    'code'
                ])
                ->order('code DESC')
                ->first();

                //dd($getLastCode);
                
                if (!empty($getLastCode)) {
                    $urut = (int)substr($getLastCode->code, 2, 5);
                } else {
                    $urut = 0;
                }

                $urut++;

                //dd($urut);
                $code = $formula.str_pad($urut, 5, '0', STR_PAD_LEFT);
                
                $entity->code = $code;
                //dd($entity);
            }
        }

        return true;
    }
}
