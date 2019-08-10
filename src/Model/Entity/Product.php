<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property int $category_id
 * @property string $name
 * @property int $price
 * @property int $stock
 * @property string $code_item
 *
 * @property \Acl\Model\Entity\Aro[] $aro
 * @property \App\Model\Entity\OrderDetail[] $order_details
 */
class Product extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'category_id' => true,
        'file' => true,
        'file_dir' => true,
        'name' => true,
        'price' => true,
        'stock' => true,
        'date' => true,
        'code_item' => true,
        'aro' => true,
        'order_details' => true
    ];
}
