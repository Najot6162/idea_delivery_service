<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\DeliveryController;
use \App\Http\Controllers\RelocationController;
use \App\Http\Controllers\BranchController;
use \App\Http\Controllers\ConfigTimeController;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\CarController;
use \App\Http\Controllers\CallCenterController;
use App\Http\Controllers\DashboardController;
use \App\Http\Controllers\ProblemController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => ['auth:sanctum']],function (){
    Route::post('/logout',[AuthController::class, 'logout']);

    //Delivery Api 
    Route::post('/create-delivery',[DeliveryController::class,'CreateDelivery']);
    Route::get('/get-all-delivery',[DeliveryController::class,'gettAllDelivery']);
    Route::put('/update-delivery/{id}',[DeliveryController::class,'updateDelivery']);
    Route::post('/upload_file',[DeliveryController::class, 'uploadFile']);
    
    //ConfigTime Api
    Route::get('/check-time',[ConfigTimeController::class, 'checkTime']);
    Route::post('/crete-config-time',[ConfigTimeController::class,'creteConfigTime']);
    Route::put('/update-config-time/{id}',[ConfigTimeController::class,'updateConfigTime']);
    Route::get('/get-all-config-time',[ConfigTimeController::class, 'getAllConfigTime']);

    //Branch Api
    Route::post('/create-branch',[BranchController::class,'createBranch']);
    Route::put('/update-branch/{id}',[BranchController::class,'updateBranch']);
    Route::get('/get-all-branchs',[BranchController::class,'getAllBranch']);
    
    //Relocation Api
    Route::post('/create-relocation',[RelocationController::class,'CreateRelocation']);
    Route::get('/get-all-relocation',[RelocationController::class,'getAllRelocation']);
    Route::put('/update-relocation/{id}',[RelocationController::class,'updateRelocation']);

    //Driver Api
    Route::post('/create-driver',[UserController::class,'createDriver']);
    Route::put('/update-driver/{id}',[UserController::class,'updateDriver']);
    Route::get('/get-all-driver',[UserController::class,'getAllDrivers']);
    Route::get('/get-delivery/{id}',[UserController::class,'getDelivery']);

    //Car Api
    Route::post('/create-car',[CarController::class,'createCar']);
    Route::put('/update-car/{id}',[CarController::class,'updateCar']);
    Route::get('/get-all-car',[CarController::class,'getAllCars']);
    Route::get('/get-car-term/{id}',[CarController::class,'getCarTerm']);
    Route::put('/update-car-term/{id}',[CarController::class,'updateCarTerm']);
    Route::delete('/car/{id}',[CarController::class,'deleteCar']);

    //Call Center Api
    Route::get('/get-all-call-delivery',[CallCenterController::class,'getAllCallDelivery']);

    //Service Api
    Route::post('/create-problem',[ProblemController::class,'createProblem']);
    Route::get('/get-all-problems',[ProblemController::class,'getAllProblems']);
    Route::put('/update-problem/{id}',[ProblemController::class,'updateProblem']);

    //Dashboard Api
    Route::get('/get-counts',[DashboardController::class,'getCounts']);

    //Permission Api
    Route::get('/get-roles_group',[UserController::class,'roleGroup']);
    Route::get('/get-permission',[UserController::class,'getPermission']);
    Route::put('/update-permisson/{id}',[UserController::class,'updatePermission']);

    //Users Api
    Route::get('/get-users',[UserController::class,'getUsers']);
    Route::put('/update-user/{id}',[UserController::class,'updateUser']);
    Route::put('/update-user-active/{id}',[UserController::class,'updateUserActive']);
    Route::put('update-user-branch/{id}',[UserController::class,'updateUserBranch']);
    Route::get('get-all-users',[UserController::class,'getAllUsers']);
    Route::post('create-user',[UserController::class,'createUser']);
});


Route::post('/login',[AuthController:: class,'login']);
