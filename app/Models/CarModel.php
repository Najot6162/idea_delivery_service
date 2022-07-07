<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'number','model','active','is_del','used'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
