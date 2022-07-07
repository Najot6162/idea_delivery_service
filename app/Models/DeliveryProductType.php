<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryProductType extends Model
{
    use HasFactory;

    protected $fillable = [
        'good','good_id','code'
    ];
}
