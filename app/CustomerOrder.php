<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $users_id
 * @property string $name
 * @property string $zip_code
 * @property string $address
 * @property string $contact
 * @property string $email
 * @property string $area_info
 * @property string $insulated
 * @property string $wall_type
 * @property string $uniq_session
 * @property string $deleted_at
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
 * @property OrderItem[] $orderItems
 */
class CustomerOrder extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['users_id', 'name', 'zip_code', 'address', 'contact', 'email', 'area_info', 'insulated', 'wall_type', 'uniq_session', 'deleted_at', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'users_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderItems()
    {
        return $this->hasMany('App\OrderItem', 'customer_orders_id');
    }
}
