<?php

namespace App\Http\Controllers;

use App\Models\DeliveryApp;
use Illuminate\Support\Carbon;
use App\Http\Resources\BranchResource;
use App\Models\BranchList;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
class DashboardController extends Controller
{
    public function getCounts(Request $request){
        $start_date = $request->start_date;
        $end_date = $request->end_date; 

        //Calculate Count by Date 
        $currentDateTime = Carbon::now();
        $OneDay = Carbon::now()->subDay();
        $week = Carbon::now()->subDays(7);
        $month = Carbon::now()->subDays(30);
        $year = Carbon::now()->subYear();

        $count_day = DeliveryApp::whereBetween('order_date', [$OneDay,$currentDateTime])->count();
        $count_week = DeliveryApp::whereBetween('order_date', [$week,$currentDateTime])->count();
        $count_month = DeliveryApp::whereBetween('order_date', [$month,$currentDateTime])->count();
        $count_year = DeliveryApp::whereBetween('order_date', [$year,$currentDateTime])->count();
        
        $date_count_arr = [
            "count_day"=>$count_day,
            "count_week"=>$count_week,
            "count_month"=>$count_month,
            "count_year"=>$count_year
        ];

        //Calculate All Orders By date
        $start_time = \Carbon\Carbon::parse($request->start_date);
        $finish_time = \Carbon\Carbon::parse($request->end_date);

        $all_orders_count = array();
        for($i = $start_time; $i <= $finish_time; $i->modify('+1 day')){
            
            $start_day =  date("Y-m-d H:i:s", strtotime("-1 day", strtotime($i)));
            $count_all_orders = DeliveryApp::whereBetween('order_date', [$start_day, $i->format("Y-m-d H:i:s")])->count();
            $all_orders_count[$start_day] = $count_all_orders;
        }   

        //Calculate count by status
        $status_one = DeliveryApp::whereBetween('order_date', [$start_date,$end_date])
                                  ->where('status',1)->count();
        $status_two = DeliveryApp::whereBetween('order_date', [$start_date,$end_date])
                                   ->where('status',2)->count();
        $status_three = DeliveryApp::whereBetween('order_date', [$start_date,$end_date])
                                    ->where('status',3)->count();
        // $status_four = DeliveryApp::whereBetween('order_date', [$start_date,$end_date])
        //                             ->where('status',4)->count();
        $status_five = DeliveryApp::whereBetween('order_date', [$start_date,$end_date])
                                    ->where('status',5)->count();
        $status_six = DeliveryApp::whereBetween('order_date', [$start_date,$end_date])
                                    ->where('status',6)->count();
        $status_seven   = DeliveryApp::whereBetween('order_date', [$start_date,$end_date])
                                    ->where('status',7)->count();
        $status_eight = DeliveryApp::whereBetween('order_date', [$start_date,$end_date])
                                    ->where('status',8)->count();
        $all_orders = DeliveryApp::whereBetween('order_date', [$start_date,$end_date])->count();
        
        $status_count_arr = [
            'count_status_one' => $status_one,
            'count_status_two' => $status_two,
            'count_status_three' => $status_three,
            // 'count_status_four' => $status_four,
            'count_status_five' => $status_five,
            'count_status_six' => $status_six,
            'count_status_seven' => $status_seven,
            'count_status_eight' => $status_eight,
            'all_orders'=>$all_orders
        ];

                                    // Calculate Delivery Counts
                //All count                 
        $all_count_driver = User::withCount(['deliveryApp',
        'deliveryApp as deliveryApp_count_status_time_one' => function (Builder $query) use ($request){
            $query->whereBetween('order_date', [$request->start_date,$request->end_date]);
                $query->where('status_time',1);
            },
            'deliveryApp as deliveryApp_count_status_time_two' => function (Builder $query) use ($request){
                $query->whereBetween('order_date', [$request->start_date,$request->end_date]);
                $query->where('status_time',2);
            },
            'deliveryApp as deliveryApp_count_status_time_three' => function (Builder $query) use ($request){
                $query->whereBetween('order_date', [$request->start_date,$request->end_date]);
                $query->where('status_time',3);
            },
            'deliveryApp as deliveryApp_count_status_time_four' => function (Builder $query) use ($request){
                $query->whereBetween('order_date', [$request->start_date,$request->end_date]);
                $query->where('status_time',4);
            },
             'relocationApp',
            'relocationApp as relocationApp_count_status_time_one' => function (Builder $query) use ($request){
                $query->whereBetween('date_order', [$request->start_date,$request->end_date]);
                $query->where('status_time',1);
            },
            'relocationApp as relocationApp_count_status_time_two' => function (Builder $query) use ($request){
                $query->whereBetween('date_order', [$request->start_date,$request->end_date]);
                $query->where('status_time',2);
            },
            'relocationApp as relocationApp_count_status_time_three' => function (Builder $query) use ($request){
                $query->whereBetween('date_order', [$request->start_date,$request->end_date]);
                $query->where('status_time',3);
            },
            'relocationApp as relocationApp_count_status_time_four' => function (Builder $query) use ($request){
                $query->whereBetween('date_order', [$request->start_date,$request->end_date]);
                $query->where('status_time',4);
            },
        ])->orderBy('deliveryApp_count_status_time_one', 'desc')  ->where('role','driver')->get();
       
                //Delivery Count
        $delivery_count_driver = User::withCount(['deliveryApp',
        'deliveryApp as deliveryApp_count_status_time_one' => function (Builder $query) use ($request){
            $query->whereBetween('order_date', [$request->start_date,$request->end_date]);
                $query->where('status_time',1);
            },
            'deliveryApp as deliveryApp_count_status_time_two' => function (Builder $query) use ($request){
                $query->whereBetween('order_date', [$request->start_date,$request->end_date]);
                $query->where('status_time',2);
            },
            'deliveryApp as deliveryApp_count_status_time_three' => function (Builder $query) use ($request){
                $query->whereBetween('order_date', [$request->start_date,$request->end_date]);
                $query->where('status_time',3);
            },
            'deliveryApp as deliveryApp_count_status_time_four' => function (Builder $query) use ($request){
                $query->whereBetween('order_date', [$request->start_date,$request->end_date]);
                $query->where('status_time',4);
            }
        ])->orderBy('deliveryApp_count_status_time_one', 'desc')  ->where('role','driver')->get();

         //Relocation Count
        $relocation_count_driver = User::withCount([
             'relocationApp',
            'relocationApp as relocationApp_count_status_time_one' => function (Builder $query) use ($request){
                $query->whereBetween('date_order', [$request->start_date,$request->end_date]);
                $query->where('status_time',1);
            },
            'relocationApp as relocationApp_count_status_time_two' => function (Builder $query) use ($request){
                $query->whereBetween('date_order', [$request->start_date,$request->end_date]);
                $query->where('status_time',2);
            },
            'relocationApp as relocationApp_count_status_time_three' => function (Builder $query) use ($request){
                $query->whereBetween('date_order', [$request->start_date,$request->end_date]);
                $query->where('status_time',3);
            },
            'relocationApp as relocationApp_count_status_time_four' => function (Builder $query) use ($request){
                $query->whereBetween('date_order', [$request->start_date,$request->end_date]);
                $query->where('status_time',4);
            },
        ])->orderBy('relocationApp_count_status_time_one', 'desc')->where('role','driver')->get();
       
         $CountDelviery = [
            'all_counts'=>$all_count_driver,
            'delviery_count'=>$delivery_count_driver,
            'relocation_count'=>$relocation_count_driver
         ];  
         
         //Calculate Branch Count
         $count_branches = BranchList::withCount([
            'delivery_app',

         'delivery_app as deliveryApp_count_by_date' => function (Builder $query) use ($request){
            $query->whereBetween('order_date', [$request->start_date, $request->end_date]);
        },
        'relocation_app',
        'relocation_app as relocationApp_count_by_date' => function (Builder $query) use ($request){
            $query->whereBetween('date_order', [$request->start_date,$request->end_date]);
            $query->where('status_time',1);
        },
        ])->get();


        $allCount = [
            'count_days'=>$date_count_arr,
            'count_select_date_all_orders_count'=>$all_orders_count,
            'count_statuses'=>$status_count_arr,
            'count_delvieries'=>$CountDelviery,
            'count_branches'=>$count_branches
        ];
        return $allCount;
    }


}
