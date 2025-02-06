<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscriptionRequest;
use App\Http\Resources\SubscriptionResource;
use App\Models\Subscription;
use Illuminate\Support\Str;


class SubscriptionController extends Controller
{
    public function index()
    {
        return SubscriptionResource::collection(Subscription::all());
    }

    public function store(SubscriptionRequest $request)
    {
        $subscription = Subscription::create($request->safe()->except('subscription_code')
        + ['subscription_code' => "@" . Str::random(10)]);

        return new SubscriptionResource($subscription);
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
