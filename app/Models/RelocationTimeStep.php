<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelocationTimeStep extends Model
{
    use HasFactory;

    protected $fillable = [
        'relocation_uuid','step','user_id','branch_id','month_uniq','comment','active'
    ];
    
    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
