<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email', 'is_admin','phone','address','car_model','car_model_id','active',
        'branch_id','name','login','password','role'
    ];

    public function deliveryApp(){
        return $this->hasMany(DeliveryApp::class, 'driver_id', 'id');
    }
    public function carModel(){
        return $this->hasOne(CarModel::class,'id','car_model_id');
    }
    public function relocationApp(){
        return $this->hasMany(RelocationApp::class, 'driver_id', 'id');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

    protected $casts = [
        'login_verified_at' => 'datetime',
    ];
}
