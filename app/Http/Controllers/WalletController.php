<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class WalletController extends Controller
{
    // renders wallet page at url/wallet (was supposed to have more things until the transactions got their own page)
    function index() {
        $userInfo = User::where('id', Auth::user()->id)->first()->load('Wallet')->load('transactions');
        return Inertia::render('Wallet', [
            'userInfo' => $userInfo,
        ]);
    }
}
