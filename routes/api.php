<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\DeliveryController;
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
    Route::post('/create-delivery',[DeliveryController::class,'CreateDelivery']);
});

Route::post('/create-branch',[DeliveryController::class,'createBranch']);
Route::put('/update-branch/{id}',[DeliveryController::class,'updateBranch']);
Route::get('/get-all-branchs',[DeliveryController::class,'getAllBranch']);

Route::post('/login',[AuthController:: class,'login']);

Route::get('/get-all-delivery',[DeliveryController::class,'gettAllDelivery']);
Route::put('/update-delivery/{id}',[DeliveryController::class,'updateDelivery']);

Route::get('/check-time',[DeliveryController::class, 'checkTime']);

Route::post('/crete-config-time',[DeliveryController::class,'creteConfigTime']);
Route::put('/update-config-time/{id}',[DeliveryController::class,'updateConfigTime']);
Route::get('/get-all-config-time',[DeliveryController::class, 'getAllConfigTime']);