<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PickupTime extends Model
{
    use HasFactory;

    protected $fillable = [
        'app_uuid','step','user_id','branch_id','month_uniq','comment','active'
    ];

    public function deliveryApp(){
        return $this->belongsTo(DeliveryApp::class);
    }
    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function branch(){
        return $this->hasOne(BranchList::class, 'id', 'branch_id');
    }
}
