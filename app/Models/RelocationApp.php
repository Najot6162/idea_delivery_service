<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelocationApp extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid', 'agent_id', 'document_id', 'provodka', 'data_order',
        'content', 'branch_send_id', 'branch_receive_id',
        'namer_order', 'id_1c', 'status', 'driver_id','config_time_id', 'status_time','step','order_date'
    ];

    public function relocation_product()
    {
        return $this->hasMany(RelocationProducts::class, 'relocation_uuid', 'uuid');
    }

    public function relocation_time_step()
    {
        return $this->hasMany(RelocationTimeStep::class, 'relocation_uuid', 'uuid')->orderBy('step','asc');
    }

    public function config_time()
    {
        return $this->hasOne(ConfigTime::class, 'id', 'config_time_id');
    }

    public function send_branch()
    {
        return $this->hasOne(BranchList::class, 'id', 'branch_send_id');
    }
    public function receive_branch()
    {
        return $this->hasOne(BranchList::class, 'id', 'branch_receive_id');
    }

    public function agents()
    {
        return $this->hasOne(Agent::class, 'agent_id', 'agent_id');
    }

}
