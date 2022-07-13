<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelocationProducts extends Model
{
    use HasFactory;

    protected $fillable = [
        'relocation_uuid','product_name','product_id','imel','imel_id','product_amount',
        'product_code'
    ];
}
