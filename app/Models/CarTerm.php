<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarTerm extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_model_id','insure_date','attorney_date',
        'attorney','adver_date','technical_date'
    ];
}
