<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    use HasFactory;

    protected $fillable = [
        'app_uuid','type','order_url','order_url_magazine'
    ];

    public function deliveryApp(){
        return $this->belongsTo(DeliveryApp::class);
    }
}
