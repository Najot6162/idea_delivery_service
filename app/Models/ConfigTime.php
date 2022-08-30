<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfigTime extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'time', 'active'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function deliveryApp()
    {
        return $this->hasMany(DeliveryApp::class,'config_time_id','id');
    }
}
