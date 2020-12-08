<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Carbon;
use Silber\Bouncer\Database\HasRolesAndAbilities;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Bouncer;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable, HasRolesAndAbilities;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'user_types', 'phone', 'zip_code', 'address', 'photo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function getRegDateAttribute(){
        return Carbon::parse($this->created_at)->format('d/m/Y');
    }


    public function getRolesAttribute(){
        $roleName = $this->getRoles()->first();
        if($roleName != ''){
            $tbl = Bouncer::role()->where('name', $roleName)->orderBy('id', 'DESC')->first();
            return $tbl;
        }else{
            return '';
        }
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
