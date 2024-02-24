<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveCustomerRequest;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function store(SaveCustomerRequest $request)
    {
        $request->validated();
        
        auth()->user()->customers()->create([
            'user_id'=>auth()->id(),
            'cargo_type'=>$request->cargo_type,
            'avg_weight'=>$request->avg_weight,
        ]);

        return response([
            'message'=>'Customer Saved',
        ],201);

    }
}
