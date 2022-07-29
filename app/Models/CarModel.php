<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'number', 'model', 'active', 'is_del', 'used'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function car_term()
    {
        return $this->hasOne(CarTerm::class, 'car_model_id', 'id');
    }
}
