<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\DangerWarning;
use App\Models\Fishpond;
use App\Models\User;
use App\Models\Wallet;
use App\Models\Subscription;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    // Loads all the fishponds with dangerzones and latest data for each data type and renders the dashboard at url/dashboard.
    // Also creates wallet and subscription data in database and then refreshes incase a new account was created
    function index(Request $request) {
        $data = fishpond::allFishpondLatestDataWithDangerzones();
        if (Wallet::where('user_id', Auth::user()->id)->first() == null) {
            $wallet = new Wallet;
            $wallet->user_id = Auth::user()->id;
            $wallet->save();
            return redirect('/dashboard');
        }
        if (Subscription::where('user_id', Auth::user()->id)->first() == null) {
            DB::table('subscriptions')->insert([
                'user_id' => Auth::user()->id,
                'added_at' => null,
                'stops_at' => null,
                'subscription_Type' => 'no subscription',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            return redirect('/dashboard');
        }
        return Inertia::render('Dashboard', [
            'data' => $data,
        ]);
    }
}
