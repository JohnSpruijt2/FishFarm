<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Team;
use App\Models\Fishpond;
use App\Models\Dangerzone;
use App\Models\Fish;
use App\Models\FishpondSensorDataLog;
use App\Models\Transaction;

class AdminController extends Controller
{
    // Renders the adminPanel.
    function index() {
        $fishponds = Fishpond::all();
        return Inertia::render('AdminPanel', [
            'fishponds' => $fishponds
        ]);
    }

    // Renders admin register page.
    function register() {
        return Inertia::render('Auth/AdminRegister', [

        ]);
    }

    // Creates new account recieved from Admin register page form through Post method.
    function createNewAccount(Request $request) {
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

    // renders Admin edit existing accounts page while excluding the current admin to avoid accidental deletal
    function editExistingAccounts() {
        $users = User::where('id', '!=', auth::user()->id)->get()->load('Wallet')->load('Subscription');
        return Inertia::render('Auth/AdminOverview', [
            'users' => $users
        ]);
    }

    // Deletes account if admin 
    function deleteAccount(Request $request) {
        $userId = $request->id;
        User::where('id', $userId)->delete();
        return redirect('/admin/editExistingAccounts');
    }

    // Renders edit fishpond overview
    function editFishpond(Request $request) {
        $fishpond = Fishpond::where('id', $request->id)->first();
        $fishes = Fish::all();
        return Inertia::render('AdminFishpondForm', [
            'fishpond' => $fishpond,
            'fishes' => $fishes
        ]);
    }

    // Edits the fishpond with data from Post form
    function confirmEditFishpond(Request $request) {
        $fishpond = Fishpond::where('id', $request->id)->first();
        $fishpond->name = $request->name;
        $fishpond->save();
        return redirect('/admin');
    }

    // updates the fish type for a fishpond
    function confirmUpdateFishType(Request $request) {
        $fishpond = Fishpond::where('id', $request->id)->first();
        $fishpond->fish_id = $request->fishType;
        $fishpond->save();
        return redirect('/admin');
    }

    // render transactions page for admin
    function showTransactions() {
        
    }
}
