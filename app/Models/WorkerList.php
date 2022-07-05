<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkerList extends Model
{
    use HasFactory;

    protected $fillable = [
        'sales_id','sales_name','branch_id','type','new'
    ];
}
