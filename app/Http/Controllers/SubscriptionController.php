<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Subscription;
use App\Models\Wallet;

class SubscriptionController extends Controller
{
    // render the subscription page for url/subscription
    function index() {
        $userInfo = User::where('id', Auth::user()->id)->first()->load('Subscription')->load('wallet');
        $subscriptions = ['no subscription', 'monthly'];
        return Inertia::render('Subscription', [
            'userInfo' => $userInfo,
            'subscriptions' => $subscriptions,
        ]);
    }

    // Checks if user selected subscribe check if they already were subscribed else also update credits
    function confirmUpdateSubscriptionType(Request $request) {
        if ($request->subscriptionType == 'monthly') {
            if (Subscription::where('user_id', Auth::User()->id)->first()->subscription_type == 'no subscription') {
                if (strtotime(User::where('id', Auth::user()->id)->first()->load('subscription')->subscription->stops_at) < strtotime(date("Y-m-d H:i:s"))) {
                    $subscription = Subscription::where('user_id', Auth::User()->id)->first();
                    $subscription->subscription_type = $request->subscriptionType;
                    $subscription->added_at = now();
                    $subscription->stops_at = now()->addHours(720);
                    $subscription->updated_at = now();
                    $subscription->save();

                    $wallet = Wallet::where('user_id', Auth::User()->id)->first();
                    $newCredits = $wallet->credits-2;
                    $wallet->credits = $newCredits;
                    $wallet->save();
                } else {
                    $subscription = Subscription::where('user_id', Auth::User()->id)->first();
                    $subscription->subscription_type = $request->subscriptionType;
                    $subscription->updated_at = now();
                    $subscription->save();
                }
                
            }
        } else if ($request->subscriptionType == 'no subscription') {
            $subscription = Subscription::where('user_id', Auth::User()->id)->first();
            $subscription->subscription_type = $request->subscriptionType;
            $subscription->updated_at = now();
            $subscription->save();
        }
        
        return redirect('/dashboard');
    }
}
