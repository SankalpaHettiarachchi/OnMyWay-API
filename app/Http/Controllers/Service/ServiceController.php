<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveServiceRequest;
use Illuminate\Http\Request;
use App\Models\Driver;

class ServiceController extends Controller
{
    public function store(SaveServiceRequest $request)
    {
        $request->validated();
        // $drivers = Driver::where('user_id', auth()->id())->first(); // Get vehicle id from driver table
        auth()->user()->services()->create([
            'user_id'=>auth()->id(),
            'vehicle_id'=>$request->vehicle_id,
            'start'=>$request->start,
            'destination'=>$request->destination,
            'current'=>$request->current,
            'status'=>$request->status,
        ]);

        return response([
            'message'=>'Service Saved',
        ],201);
    }
}
