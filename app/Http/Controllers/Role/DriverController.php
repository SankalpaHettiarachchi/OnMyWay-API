<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveDriverRequest;
use App\Models\User;
use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function store(SaveDriverRequest $request)
    {
        $request->validated();
        
        auth()->user()->drivers()->create([
            'user_id'=>auth()->id(),
            'vehicle_id'=>$request->vehicle_id,
            'license_id'=>$request->license_id,
        ]);

        return response([
            'message'=>'Driver Saved',
        ],201);
    }
}
