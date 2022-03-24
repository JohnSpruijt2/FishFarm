<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    function index() {
        if (auth::user()->admin != 1) {
            return redirect('/dashboard');
        }
        return Inertia::render('AdminPanel', [

        ]);
    }
}
