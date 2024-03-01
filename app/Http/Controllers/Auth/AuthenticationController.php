<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckDriverRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Driver;

class AuthenticationController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $request->validated();

        $user_data = [
            'fname'=>$request->fname,
            'lname'=>$request->lname,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'password'=>Hash::make($request->password),
        ];

        $user = User::create($user_data);
        $token = $user->createToken('OnMyWay-API')->plainTextToken;

        return response([
            'user'=>$user,
            'token'=>$token,
        ],201);
    }

    public function login(LoginRequest $request)
    {
        $request->validated();
        $user = User::whereemail($request->username)->first();
        if(!$user || !Hash::check($request->password,$user->password))
        {
            return response([
                'message'=>'Inavalid Login'
            ],422);
        }

        $token = $user->createToken('OnMyWay-API')->plainTextToken;
        return response([
            'user'=>$user,
            'token'=>$token
        ],200);
    }

    public function check_driver(CheckDriverRequest $request)
    {
        $request->validated();
        $driver = Driver::where('user_id', auth()->id())->first();
        $isDriver = $driver ? true : false;

        return response([
            'isDriver' => $isDriver,
        ], 200);
    }
}
