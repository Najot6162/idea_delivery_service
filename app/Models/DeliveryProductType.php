<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryProductType extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_pub','good','good_id','code'
    ];
}
