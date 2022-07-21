<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProblemApp extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid','user_id','service_id','document_id','agent_id','provodka',
        'data_order','content','document_foundations','document_foundations_id','nak_number',
        'nak_data','defect','branch_id','namer_order','guid','guid_id','branch_sale_id',
        'id_1c','log_id','status','status_app','step','reception_type','new_product','is_problem'
    ];

    public function problem_time_step(){
        return $this->hasMany(ProblemTimeStep::class, 'problem_uuid', 'uuid');
    }
    public function problem_service(){
        return $this->hasMany(ProblemService::class, 'problem_uuid', 'uuid');
    }
    public function agents(){
            return $this->hasOne(Agent::class, 'agent_id', 'agent_id');
        }
    public function problem_product(){
        return $this->hasMany(ProblemTimeStep::class, 'problem_uuid', 'uuid');
    }
    public function branch(){
        return $this->hasOne(BranchList::class, 'id', 'branch_id');
    }
    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
