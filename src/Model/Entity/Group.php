<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;


class Group extends Entity
{
    
    protected $_accessible = [
        'name' => true,
        'created' => true,
        'modified' => true,
        'users' => true
    ];

     public function parentNode()
    {
        return null;
    }

}   
