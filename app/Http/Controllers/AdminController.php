<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Team;

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

    function register() {
        if (auth::user()->admin != 1) {
            return redirect('/dashboard');
        }
        return Inertia::render('Auth/AdminRegister', [

        ]);
    }

    function createNewAccount(Request $request) {
        if (auth::user()->admin != 1) {
            return redirect('/dashboard');
        }
        $input = $request->all();
        
        if (filter_var( $input['email'], FILTER_VALIDATE_EMAIL ) == false) {
            return redirect('/admin/createNewAccount');
        } else if (user::where('email', $input['email'])->get()->first() != null) {
            return redirect('/admin/createNewAccount');
        } else if (strlen($input['name']) < 3 || strlen($input['name']) > 30) {
            return redirect('/admin/createNewAccount');
        } else if (strlen($input['password']) < 8 || strlen($input['password'] > 30)) {
            return redirect('/admin/createNewAccount');
        } else if ($input['password'] != $input['password_confirmation']) {
            return redirect('/admin/createNewAccount');
        } else {
            User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
            ]);
            $userId = User::max('id');
            $user = User::where('id', $userId)->get()[0];
            Team::forceCreate([
                'user_id' => $user->id,
                'name' => explode(' ', $user->name, 2)[0]."'s Team",
                'personal_team' => true,
            ]);
            $user->current_team_id = Team::max('id');
            $user->save();
        }
        
        return redirect('/dashboard');
    }

    function editExistingAccounts() {
        if (auth::user()->admin != 1) {
            return redirect('/dashboard');
        }
        $users = User::where('id', '!=', auth::user()->id)->get();
        return Inertia::render('Auth/AdminOverview', [
            'users' => $users
        ]);
    }

    function deleteAccount(Request $request) {
        if (auth::user()->admin != 1) {
            return redirect('/dashboard');
        }
        $userId = $request->id;
        User::where('id', $userId)->delete();
        return redirect('/admin/editExistingAccounts');
    }
}
