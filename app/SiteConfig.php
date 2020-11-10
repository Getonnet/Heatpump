<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $logo
 * @property string $language
 * @property string $currency
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 */
class SiteConfig extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'logo', 'language', 'currency', 'deleted_at', 'created_at', 'updated_at'];

}
