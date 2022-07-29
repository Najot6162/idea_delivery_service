<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'delivery_uuid','product_name','product_id','imel','imel_id','product_amount',
        'product_code','address','sales','sales_id','sales_id_our'
    ];
}
