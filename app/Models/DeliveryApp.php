<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryApp extends Model
{
    use HasFactory;

    protected $fillable = [
        'agent_id','data_pub','uniq_day','user_id','order_id','online','order_date',
        'date_create','document_id','provodka','content','orienter','client','client_id',
        'group_price','vid_oplata','id_1c','oplachena','step_one','step_two','step_six',
        'step','status','dallon','car_model_id','branch_id','change_date','change_status',
        'config_time_id','end_time','status_time','different_status_time','add_hours',
        'delivery_type','delivered_branch','confirm_cancelled','driver_manager'
    ];
}
