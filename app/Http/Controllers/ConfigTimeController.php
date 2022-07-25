<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConfigTime;
use Illuminate\Support\Carbon;
use App\Models\DeliveryApp;

class ConfigTimeController extends Controller
{
    public function checkTime(Request $request){
        $deliveries = DeliveryApp::whereNotIn('status', ['4','5','6','7','8'])->get();
        $config_time = ConfigTime::where('active','1')->first();
        $time = $config_time->time;
        $time1 = $time/3;
        $time2 = $time1*2; 
      
        foreach($deliveries as $delivery){
           // $start_date = Carbon::createFromFormat('Y-m-d\TH:i:s.u\Z', $delivery->order_date);
            $start_date = $delivery->order_date;
            $current_date = Carbon::now()->toDateTimeString();  
            $to = Carbon::createFromFormat('Y-m-d H:s:i', $current_date);
            $from = Carbon::createFromFormat('Y-m-d H:s:i', $start_date);
            $diff_in_hours = $to->diffInHours($from);
            if($time1>=$diff_in_hours){
                $delivery->status_time = 1;
            }if($time2>=$diff_in_hours){
                $delivery->status_time = 2;
            }if($time>=$diff_in_hours){
                $delivery->status_time = 3;
            }else{
                $delivery->status_time = 4;
            }

            if($delivery->save()){
                echo "status time updated";
            };
        }
        
        return true;
    }

    public function creteConfigTime(Request $request){
        $request->validate([
            'user_id'=>'required',
            'time'=>'required',
        ]);

        $config_time = new ConfigTime();
        $config_time->user_id = $request->user_id;
        $config_time->time = $request->time;
        //$config_time->count_app = $request->count_app;
        $config_time->active = $request->active;

        if($config_time->save()){
            echo "config_time saved  ";
        };
    }

    public function updateConfigTime(Request $request,$id){
        $config_time = ConfigTime::findOrFail($id);
        $config_time->time = $request->time;
        $config_time->active = $request->active;

        if($config_time->save()){
            echo "config_time updated  ";
        };
    }
    public function getAllConfigTime(Request $request){
        $config_times = ConfigTime::get();
        return $config_times;
    }
}
