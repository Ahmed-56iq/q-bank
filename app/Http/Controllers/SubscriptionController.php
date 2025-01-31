<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscriptionRequest;
use App\Http\Resources\SubscriptionResource;
use App\Models\Subscription;

class SubscriptionController extends Controller
{
    public function index()
    {
        return SubscriptionResource::collection(Subscription::all());
    }

    public function store(SubscriptionRequest $request)
    {
        return new SubscriptionResource(Subscription::create($request->validated()));
    }

    public function show(Subscription $subscription)
    {
        return new SubscriptionResource($subscription);
    }

    public function update(SubscriptionRequest $request, Subscription $subscription)
    {
        $subscription->update($request->validated());

        return new SubscriptionResource($subscription);
    }

    public function destroy(Subscription $subscription)
    {
        $subscription->delete();

        return response()->json();
    }
}
