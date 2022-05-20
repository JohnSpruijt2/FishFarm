<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Subscription;

class SubscriptionController extends Controller
{
    //
    function index() {
        $userInfo = User::where('id', Auth::user()->id)->first()->load('Subscription');
        //$subscriptionInfo = Subscription::where('user_id', Auth::user()->id)->first()->load('Subscription');
        $subscriptions = ['no subscription', 'monthly'];
        return Inertia::render('Subscription', [
            'userInfo' => $userInfo,
            //'subscriptionInfo' => $subscriptionInfo,
            'subscriptions' => $subscriptions,
        ]);
    }

    function confirmUpdateSubscriptionType(Request $request) {
        $subscription = Subscription::where('id', $request->id)->first();
        $subscription->subscription_type = $request->subscriptionType;
        $subscription->save();
        return redirect('/dashboard');
    }
}
