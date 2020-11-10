<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $customer_orders_id
 * @property int $products_id
 * @property float $price
 * @property float $qty
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * @property CustomerOrder $customerOrder
 * @property Product $product
 */
class OrderItem extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['customer_orders_id', 'products_id', 'price', 'qty', 'deleted_at', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customerOrder()
    {
        return $this->belongsTo('App\CustomerOrder', 'customer_orders_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Product', 'products_id');
    }
}
