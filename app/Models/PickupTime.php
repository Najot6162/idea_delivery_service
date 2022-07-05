<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PickupTime extends Model
{
    use HasFactory;

    protected $fillable = [
        'app_id','step','user_id','data_pub','month_uniq','comment','active'
    ];
}
