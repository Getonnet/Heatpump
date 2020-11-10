<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $photo
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * @property Product[] $products
 */
class ProductBrand extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'photo', 'deleted_at', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany('App\Product', 'product_brands_id');
    }
}
