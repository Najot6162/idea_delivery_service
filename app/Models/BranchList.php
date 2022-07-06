<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchList extends Model
{
    use HasFactory;

    protected $fillable = [
        'title','token','region_id'
    ];

  
    public function region(){
        return $this->belongsTo(BranchRegion::class);
    }

    public function deliveryApp(){
        return $this->belongsTo(DeliveryApp::class);
    }
}
