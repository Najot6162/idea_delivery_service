<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\BranchResource;
use App\Models\DeliveryApp;
use Illuminate\Contracts\Database\Eloquent\Builder;

class UserController extends Controller
{
    public function createDriver(Request $request){
        
        $request->validate([
            'phone'=>'required',
            'name'=>'required',
            'password'=>'required'
        ]);
        echo $request;
        $user = new User();
        $user->login = $request->name;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);
        $user->car_model_id = $request->car_model_id;
        $user->active = $request->active;
        $user->role = 'driver';
        if($user->save()){
            echo "Driver created";
        };
    }

    public function updateDriver(Request $request, $id){

        if($request->only_active){
            $user = User::findOrFail($id);
            $user->active = $request->only_active;
        if($user->save()){
            echo "Driver updated";
        };
        return true;
        }
        $request->validate([
            'phone'=>'required',
            'name'=>'required',
            'password'=>'required',
            'role'=>'required'
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);
        $user->car_model_id = $request->car_model_id;
        $user->active = $request->active;
        if($user->save()){
            echo "Driver updated";
        };
        return true;
    }

    public function getAllDrivers(Request $request){
        $search = $request['search']??"";
        $pageCount = $request['page']??"10";

       $users = User::withCount([
        'deliveryApp',
        'deliveryApp as count_status_two' => function (Builder $query) use ($request){
                if($request->start_date){
                    $query->where('order_date','>=',$request->start_date);
                }
                if($request->end_date){
                    $query->where('order_date','<=',$request->end_date);
                }
                if($request->start_date&&$request->end_date){
                    $query->whereBetween('order_date', [$request->start_date,$request->end_date]);
                }
                if($request->branch_id){
                    $query->whereIn('branch_id',$request->branch_id);
                }
            $query->where('status',2);
        },
        'deliveryApp as count_status_three' => function (Builder $query)use ($request){
            if($request->start_date){
                $query->where('order_date','>=',$request->start_date);
            }
            if($request->end_date){
                $query->where('order_date','<=',$request->end_date);
            }
            if($request->start_date&&$request->end_date){
                $query->whereBetween('order_date', [$request->start_date,$request->end_date]);
            }
            if($request->branch_id){
                $query->whereIn('branch_id',$request->branch_id);
            }
            $query->where('status',3);
        },
        'deliveryApp as count_status_eight' => function (Builder $query)use ($request){
            if($request->start_date){
                $query->where('order_date','>=',$request->start_date);
            }
            if($request->end_date){
                $query->where('order_date','<=',$request->end_date);
            }
            if($request->start_date&&$request->end_date){
                $query->whereBetween('order_date', [$request->start_date,$request->end_date]);
            }
            if($request->branch_id){
                $query->whereIn('branch_id',$request->branch_id);
            }
            $query->where('status',8);
        },
    ])->where('role','driver')
    ->where('name','LIKE',"%$search%")  
    ->orWhere('phone','LIKE',"%$search%")  
    ->join('car_models','car_models.id', '=','users.car_model_id')
    ->orWhere('car_models.number','LIKE',"%$search%")
    ->orWhere('car_models.model','LIKE',"%$search%")
    ->paginate($pageCount);

    foreach($users as $user){
         $user->carModel; 
        // $user->deliveryApp;
    }
   
         return BranchResource::collection($users);
    }

    public function getDelivery(Request $request,$id){
        $search = $request['search']??"";
        $pageCount = $request['page']??"10";
        $start_date = $request->start_date;
        $end_date = $request->end_date; 

        $delviery = DeliveryApp::where('driver_id', $id)
        ->where('status_time','LIKE',"%$search%") 
        ->whereIn('status',$request->status??[1,2,3,4,5,6,7,8])
        ->whereIn('status_time',$request->status_time??[1,2,3,4]);

        if($start_date){
            $delviery->where('order_date','>=',$start_date);
        }
        if($end_date){
            $delviery->where('order_date','<=',$end_date);
        }
        if($start_date&&$end_date){
            $delviery->whereBetween('order_date', [$start_date,$end_date]);
        }
        if($request->branch_id){
            $delviery->whereIn('branch_id',$request->branch_id);
        }

        return BranchResource::collection($delviery->paginate($pageCount));
    }
}
