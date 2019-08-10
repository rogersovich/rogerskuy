<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;


class Customer extends Entity
{
    
    protected $_accessible = [
        'nama_depan' => true,
        'nama_belakang' => true,
        'user_id' => true,
        'address' => true,
        'saldo' => true,
        'email' => true
    ];

    public function parentNode()
    {
        return null;
    }

}
