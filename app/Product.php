<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $product_categories_id
 * @property int $product_brands_id
 * @property string $name
 * @property string $product_types
 * @property float $capacity
 * @property float $noise_level
 * @property float $price
 * @property string $photo
 * @property mixed $other_needs
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * @property ProductBrand $productBrand
 * @property ProductCategory $productCategory
 * @property OrderItem[] $orderItems
 * @property ProductAttribute[] $productAttributes
 */
class Product extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['product_categories_id', 'product_brands_id', 'name', 'product_types', 'capacity', 'noise_level', 'price', 'photo', 'other_needs', 'details_link', 'descriptions', 'deleted_at', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productBrand()
    {
        return $this->belongsTo('App\ProductBrand', 'product_brands_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productCategory()
    {
        return $this->belongsTo('App\ProductCategory', 'product_categories_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderItems()
    {
        return $this->hasMany('App\OrderItem', 'products_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productAttributes()
    {
        return $this->hasMany('App\ProductAttribute', 'products_id');
    }
}
