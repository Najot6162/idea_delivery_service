<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfigTime extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','time','count_app','active','date_pub'
    ];
}
