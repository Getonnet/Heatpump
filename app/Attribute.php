<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $attribute_type
 * @property mixed $attribute_value
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * @property ProductAttribute[] $productAttributes
 */
class Attribute extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'attribute_type', 'attribute_value', 'deleted_at', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productAttributes()
    {
        return $this->hasMany('App\ProductAttribute', 'attributes_id');
    }
}
