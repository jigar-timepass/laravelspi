<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Resources\CustomerCollection;
use App\Http\Resources\CustomerResource;
 
class CustomerAPIController extends Controller
{
    public function index()
    {
        return new CustomerCollection(Customer::paginate());
    }
 
    public function show(Customer $customer)
    {
        return new CustomerResource($customer->load(['emails', 'phones', 'pictures']));
    }

    public function store(Request $request)
    {
        return new CustomerResource(Customer::create($request->all()));
    }

    public function update(Request $request, Customer $customer)
    {
        $customer->update($request->all());

        return new CustomerResource($customer);
    }

    public function destroy(Request $request, Customer $customer)
    {
        $customer->delete();

        return response()->json([], \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }
}