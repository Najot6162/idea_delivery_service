<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'address', 'address_real', 'address_passport', 'client_id', 'code', 'phone', 'passport', 'status'
    ];
}
