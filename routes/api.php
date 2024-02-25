<?php

use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\Role\CustomerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Role\DriverController;
use App\Http\Controllers\Service\ServiceController;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/testapi', function()
{
    return response([
        'message'=>'API is working',
    ],200);
});

Route::post('register',[AuthenticationController::class,'register']);
Route::post('login',[AuthenticationController::class,'login']);

Route::post('save_driver',[DriverController::class,'store'])->middleware('auth:sanctum');
Route::post('save_customer',[CustomerController::class,'store'])->middleware('auth:sanctum');
Route::post('save_service',[ServiceController::class,'store'])->middleware('auth:sanctum');