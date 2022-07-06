<?php

namespace App\Http\Controllers;

use App\Http\Resources\BranchResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\DeliveryApp;
use App\Models\Agent;
use App\Models\Branch;
use App\Models\Files;
use App\Models\Client;
use App\Models\User;
use App\Models\PickupTime;
use App\Models\DeliveryProduct;
use App\Models\DeliveryProductType; 
use App\Models\BranchList;
use Illuminate\Support\Facades\Auth;
use DateTime;
class DeliveryController extends Controller
{
    public function CreateDelivery(Request $request){

        // $validator = Validator::make($request->all(),[
        //     $request[0]['AGENTID'] => 'required',
        //     $request[0]['AGENT'] => 'required',
        //     $request[0]['DokumentId'] => 'required',
        //     $request[0]['PRAVODKA'] =>'required',
        //     $request[0]['DataOrder'] => 'required',
        //     $request[0]['Content'] => 'required',
        //     $request[0]['Orinter'] => 'required',
        //     $request[0]['DataCreate'] => 'required',
        //     $request[0]['Sklad'] => 'required',
        //     $request[0]['SkladID'] => 'required',
        //     $request[0]['SkladSale'] => 'required',
        //     $request[0]['SkladSaleID'] => 'required',
        //     $request[0]['Online'] => 'required',
        //     $request[0]['DostavkaStore'] => 'required',
        //     $request[0]['NamerOrder'] => 'required',
        //     $request[0]['GUID'] => 'required',
        //     $request[0]['GUIDID'] => 'required',
        //     $request[0]['GroupPrice'] => 'required',
        //     $request[0]['VidOplata'] => 'required',
        //     $request[0]['Oplachena'] => 'required',
        //     $request[0]['Id1C'] => 'required',
        // ]);
        
        // if($validator->fails())
        // {
        //     return response()->json([    
        //         'status_code'=>400,
        //         'message'=>'Bad Request'
        //     ]);
        // }

        $dt = new DateTime();
        $user = Auth::user();
        $branches = [
            'branch_id'=>[],
            'branch_sale_id'=>[]
        ];
        $branch = BranchList::where('token', $request[0]['SkladID'])->get();
            
        if($branch->isEmpty()){
            $branchList = new BranchList();

            $branchList->title = $request[0]['Sklad'];
            $branchList->token=$request[0]['SkladID'];
    
            if($branchList->save()){
                echo "BranchList saved  ";
            };
            $branch = BranchList::where('token', $request[0]['SkladID'])->get();
            array_push($branches['branch_id'], $branch[0]['id']);
        }else{ 
           array_push($branches['branch_id'], $branch[0]['id']);
        }

        

        $branch = BranchList::where('token', $request[0]['SkladSaleID'])->get();  
    if($branch->isEmpty()){
        $branchList = new BranchList();

        $branchList->title = $request[0]['SkladSale'];
        $branchList->token=$request[0]['SkladSaleID'];

        if($branchList->save()){
            echo "BranchList saved  ";
        };
        $branch = BranchList::where('token', $request[0]['SkladSaleID'])->get();
        array_push($branches['branch_sale_id'], $branch[0]['id']);
    }else{ 
       array_push($branches['branch_sale_id'], $branch[0]['id']);
    }
            
        $delivery = new DeliveryApp();
        $delivery->agent_id = $request[0]['AGENTID'];
        $delivery->date_pub =$dt->format('Y-m-d H:i:s');   
        $delivery->user_id = $user->id;
        $delivery->order_id = $request[0]['NamerOrder'];
        $delivery->online = $request[0]['Online']; 
        $delivery->order_date = $request[0]['DataOrder'];
        $delivery->date_create = $request[0]['DataCreate'];  
        $delivery->document_id = $request[0]['DokumentId'];  
        $delivery->provodka = $request[0]['PRAVODKA'];  
        $delivery->content = $request[0]['Content'];  
        $delivery->orienter = $request[0]['Orinter'];  
        $delivery->client = $request[0]['AGENT'];  
        $delivery->client_id = $request[0]['AGENTID'];  
        $delivery->group_price = $request[0]['GroupPrice'];  
        $delivery->vip_oplata = $request[0]['VidOplata'];  
        $delivery->id_1c = $request[0]['Id1C'];  
        $delivery->oplachena = $request[0]['Oplachena'];  
        //$delivery->step_one = ?
        //$delivery->step_two = ?
        //$delivery->step_six = ? 
        //$delivery->step = ?   
        //$delivery->status = ?
        //$delivery->dallon = ?; 
        //$delivery->car_model_id = ?  
        $delivery->branch_id = $branches['branch_id'][0];  
        $delivery->branch_sale_id = $branches['branch_sale_id'][0];  
        //$delivery->change_date = $dt->? 
        //$delivery->change_status = ?  
        //$delivery->config_time_id = ? 
        //$delivery->end_time = $dt->? 
        //$delivery->status_time = ?
        //$delivery->different_status_time = ?
        //$delivery->add_hours = ?
        //$delivery->delivery_type = ?
        //$delivery->delivered_branch = ?
        //$delivery->confirm_cancelled = ?
        //$delivery->driver_manager = ?

        if($delivery->save()){
            echo " Delivery_app  saved  ";
        }

        $agent = new Agent();
        $agent->agent=$request[0]['AGENT'];
        $agent->agent_id=$request[0]['AGENTID'];
        
       if($agent->save()){
        echo " Agent saved  ";
       };
       
        

        // $pickup_time = new PickupTime();
        // $pickup_time->app_id = 0;
        // $pickup_time->user_id = $user->id;
        // $pickup_time->date_pub =$dt->format('Y-m-d H:i:s');   
        // $pickup_time->active=1;

        // if($pickup_time->save()){
        //     echo "pickup_time saved  ";
        // };

        foreach($request[0]['goods'] as $good){
        $delivery_products = new DeliveryProduct(); 
        $delivery_products->date_pub =$dt->format('Y-m-d H:i:s');   
        $delivery_products->delivery_id = 1;
        $delivery_products->product_name = $good['Good'];
        $delivery_products->product_id = $good['GoodId'];
        $delivery_products->imel = $good['IMEI'];
        $delivery_products->imel_id = $good['IMEIId'];
        $delivery_products->product_amount = $good['amount'];
        $delivery_products->product_code = $good['code'];
        $delivery_products->sales = $good['sales'];
        $delivery_products->sales_id = $good['salesid'];

         if($delivery_products->save()){
            echo " Delivery_products saved  ";
        };
        };
        $delivery_client = new Client();
        $delivery_client->date_pub =$dt->format('Y-m-d H:i:s');   
        $delivery_client->name = $request[0]['AGENT'];
        //$delivery_client->address =?
        //$delivery_client->address_real = ?
        //$delivery_client->address_passport = ?
        $delivery_client->client_id = $request[0]['AGENTID']; 
        //$delivery_client->code?
        //$delivery_client->phone = ?
        //$delivery_client->passport=?
        //$delivery_client->status?

        if($delivery_client->save()){
            echo " Delivery_client saved  ";
        };

        return " All data saved.";
    }

    public function updateDelivery(Request $request){

        return true;
    }

    public function gettAllDelivery(Request $request){
        $search = $request['search']??"";
        $pageCount = $request['page']??"10";
        $deliveries = DeliveryApp::with('agent')->where('client','LIKE',"%$search%")->paginate($pageCount);

        foreach($deliveries as $delivery){
            $branch = $delivery->branch;
            $branch_sale = $delivery->branch_sale;
            $files = $delivery->files;
            $user = $delivery->user;
            $pickup_time = $delivery->pickup_time;
            $delivery_product = $delivery->delivery_product;
            $client = $delivery->delivery_client;
        }

        return BranchResource::collection($deliveries);
    }

    public function createBranch(Request $request){

       $request->validate([
            'title'=>'required',
            'token'=>'required',
            'region_id'=>'required'
        ]);

        $branchList = new BranchList();

        $branchList->title = $request->title;
        $branchList->token=$request->token;
        $branchList->region_id = $request->region_id;

        if($branchList->save()){
            echo "branchList saved  ";
        };

    }

    public function updateBranch(Request $request,$id){

        $branch = BranchList::findOrFail($id);
        $branch->region_id = $request->region_id;

        if($branch->save()){
            echo "branchList updated  ";
        };
    }

    public function getAllBranch(Request $request){
        $search = $request['search']??"";
        $pageCount = $request['page']??"10";
        $br = BranchList::with('region')->where('title','LIKE',"%$search%")->paginate($pageCount);
        return BranchResource::collection($br);
    }
}
