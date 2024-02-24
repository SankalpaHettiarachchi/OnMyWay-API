<?php

use App\Http\Controllers\Auth\AuthenticationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/testapi', function()
{
    return response([
        'message'=>'API is working',
    ],200);
});

Route::post('register',[AuthenticationController::class,'register']);