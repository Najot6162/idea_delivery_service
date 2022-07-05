<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkerMenu extends Model
{
    use HasFactory;

    protected $fillable = [
        'link','title','order_list','parent_id',
        'icon','is_delete'
    ];
}
