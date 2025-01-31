<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscriptionTypeRequest;
use App\Http\Resources\SubscriptionTypeResource;
use App\Models\SubscriptionType;

class SubscriptionTypeController extends Controller
{
    public function index()
    {
        return SubscriptionTypeResource::collection(SubscriptionType::all());
    }

    public function store(SubscriptionTypeRequest $request)
    {
        return new SubscriptionTypeResource(SubscriptionType::create($request->validated()));
    }

    public function show(SubscriptionType $subscriptionType)
    {
        return new SubscriptionTypeResource($subscriptionType);
    }

    public function update(SubscriptionTypeRequest $request, SubscriptionType $subscriptionType)
    {
        $subscriptionType->update($request->validated());

        return new SubscriptionTypeResource($subscriptionType);
    }

    public function destroy(SubscriptionType $subscriptionType)
    {
        $subscriptionType->delete();

        return response()->json();
    }
}
