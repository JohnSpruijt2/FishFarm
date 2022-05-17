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
}
