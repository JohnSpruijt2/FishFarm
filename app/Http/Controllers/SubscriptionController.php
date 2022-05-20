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
        $userInfo = User::where('id', Auth::user()->id)->first()->load('Subscription')->load('wallet');
        $subscriptions = ['no subscription', 'monthly'];
        return Inertia::render('Subscription', [
            'userInfo' => $userInfo,
            'subscriptions' => $subscriptions,
        ]);
    }

    function confirmUpdateSubscriptionType(Request $request) {
        if ($request->subscriptionType == 'monthly') {
            if (Subscription::where('user_id', $request->id)->first()->subscription_type == null || Subscription::where('user_id', $request->id)->first()->subscription_type == 'no subscription') {
                $subscription = Subscription::where('user_id', $request->id)->first();
                $subscription->subscription_type = $request->subscriptionType;
                $subscription->added_at = now();
                $subscription->stops_at = now()->addHours(720);
                $subscription->updated_at = now();
                $subscription->save();
            }
        } else if ($request->subscriptionType == 'no subscription') {
            $subscription = Subscription::where('user_id', $request->id)->first();
            $subscription->subscription_type = $request->subscriptionType;
            $subscription->updated_at = now();
            $subscription->save();
        }
        
        return redirect('/dashboard');
    }
}
