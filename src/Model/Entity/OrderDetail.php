<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OrderDetail Entity
 *
 * @property int $id
 * @property int $order_id
 * @property int $product_id
 * @property int $qty
 * @property string $size
 *
 * @property \App\Model\Entity\Order $order
 * @property \App\Model\Entity\Product $product
 */
class OrderDetail extends Entity
{
    
    protected $_accessible = [
        'order_id' => true,
        'product_id' => true,
        'qty' => true,
        'order' => true,
        'product' => true,
        'size' => true,
    ];
}
