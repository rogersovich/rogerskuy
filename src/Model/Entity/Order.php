<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Order extends Entity
{
    
    protected $_accessible = [
        'code' => true,
        'date' => true,
        'total_price' => true,
        'paid' => true,
        'change_money' => true,
        'order_details' => true,
        'saldo_terpakai' => true
    ];
}
