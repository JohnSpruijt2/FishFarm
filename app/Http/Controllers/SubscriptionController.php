<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class SubscriptionController extends Controller
{
    //
    function index() {
        $userInfo = User::where('id', Auth::user()->id)->first()->load('Subscription');
        return Inertia::render('Subscription', [
            'userInfo' => $userInfo,
        ]);
    }

    function confirmUpdateSubscriptionType(Request $request) {
        $subscription = Subscription::where('id', $request->id)->first();
        $subscription->subscription_id = $request->subscriptionType;
        $subscription->save();
        return redirect('/dashboard');
    }
}
