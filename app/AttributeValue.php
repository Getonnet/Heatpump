<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $product_attributes_id
 * @property string $name
 * @property string $key_name
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * @property ProductAttribute $productAttribute
 */
class AttributeValue extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['product_attributes_id', 'name', 'key_name', 'deleted_at', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productAttribute()
    {
        return $this->belongsTo('App\ProductAttribute', 'product_attributes_id');
    }
}
