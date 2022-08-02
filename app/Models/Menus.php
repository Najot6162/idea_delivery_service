<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menus extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','type','step'
    ];


    public function userPermission()
    {
        return $this->hasMany(UserPermission::class, 'menu_id', 'id');
    }
}
