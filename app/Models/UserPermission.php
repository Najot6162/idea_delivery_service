<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{
    use HasFactory;

    protected $fillable = [
        'role_id', 'menu_id', 'value'
    ];

    public function roles()
    {
        return $this->hasOne(RoleList::class, 'id', 'role_id');
    }

    public function menus()
    {
        return $this->hasOne(Menus::class, 'id', 'menu_id');
    }
}
