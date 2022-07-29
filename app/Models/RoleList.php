<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleList extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function menus(){
        return $this->hasOne(Menus::class, 'id', 'menu_id');
    }
    public function users(){
        return $this->hasOne(User::class, 'role_id', 'id');
    }
}
