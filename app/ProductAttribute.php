<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $products_id
 * @property int $attributes_id
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * @property Attribute $attribute
 * @property Product $product
 * @property AttributeValue[] $attributeValues
 */
class ProductAttribute extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['products_id', 'attributes_id', 'deleted_at', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function attribute()
    {
        return $this->belongsTo('App\Attribute', 'attributes_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Product', 'products_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attributeValues()
    {
        return $this->hasMany('App\AttributeValue', 'product_attributes_id');
    }
}
