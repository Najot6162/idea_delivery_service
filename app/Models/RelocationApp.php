<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelocationApp extends Model
{
    use HasFactory;

    protected $fillable = [
       'uuid','agent','agent_id','document_id','provodka','data_order',
       'content','branch_send_id','branch_recieve_id','branch_recieve',
       'namer_order','id_1c','status','drvier_id','car_model_id','config_time_id','status_time' 
    ];

    public function relocation_product(){
        return $this->hasMany(RelocationProducts::class, 'relocation_uuid', 'uuid');
    }
    public function relocation_time_step(){
        return $this->hasMany(RelocationTimeStep::class, 'relocation_uuid', 'uuid');
    }
    public function config_time(){
        return $this->hasOne(ConfigTime::class, 'id', 'config_time_id');
    }
    public function branch(){
        return $this->hasOne(BranchList::class, 'id', 'branch_send_id');
    }
    public function car_model(){
        return $this->hasOne(CarModel::class, 'id', 'car_model_id');
    }
}
