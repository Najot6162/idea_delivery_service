<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BranchList;
use App\Http\Resources\BranchResource;
use Illuminate\Support\Facades\Validator;

class BranchController extends Controller
{
    
    public function createBranch(Request $request){

        $validator = Validator::make($request->all(),[
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
