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
use App\Models\FishpondSensorDataLog;

class AdminController extends Controller
{
    // Renders the adminPanel.
    function index() {
        if (auth::user()->admin != 1) {
            return redirect('/dashboard');
        }
        $fishponds = Fishpond::all();
        return Inertia::render('AdminPanel', [
            'fishponds' => $fishponds
        ]);
    }

    // Renders admin register page.
    function register() {
        if (auth::user()->admin != 1) {
            return redirect('/dashboard');
        }
        return Inertia::render('Auth/AdminRegister', [

        ]);
    }

    // Creates new account recieved from Admin register page form through Post method.
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

    // renders Admin edit existing accounts page while excluding the current admin to avoid accidental deletal
    function editExistingAccounts() {
        if (auth::user()->admin != 1) {
            return redirect('/dashboard');
        }
        $users = User::where('id', '!=', auth::user()->id)->get()->load('Wallet');
        return Inertia::render('Auth/AdminOverview', [
            'users' => $users
        ]);
    }

    // Deletes account if admin 
    function deleteAccount(Request $request) {
        if (auth::user()->admin != 1) {
            return redirect('/dashboard');
        }
        $userId = $request->id;
        User::where('id', $userId)->delete();
        return redirect('/admin/editExistingAccounts');
    }

    // Renders edit fishpond overview
    function editFishpond(Request $request) {
        if (auth::user()->admin != 1) {
            return redirect('/dashboard');
        }
        $fishpond = Fishpond::where('id', $request->id)->first();
        return Inertia::render('AdminFishpondForm', [
            'fishpond' => $fishpond
        ]);
    }

    // Edits the fishpond with data from Post form
    function confirmEditFishpond(Request $request) {
        if (auth::user()->admin != 1) {
            return redirect('/dashboard');
        }
        $fishpond = Fishpond::where('id', $request->id)->first();
        $fishpond->name = $request->name;
        $fishpond->save();
        return redirect('/admin');
    }

    // Renders the admin edit dangerzones page
    function editDangerzones(Request $request) {
        if (auth::user()->admin != 1) {
            return redirect('/dashboard');
        }
        $name = Fishpond::where('id', $request->id)->first()->name;
        $data = Dangerzone::where('fishpond_id', $request->id)->where('data_type', $request->dataType)->first();
        return Inertia::render('AdminDangerzoneForm', [
            'name' => $name,
            'data' => $data,
        ]);
    }
    
    // Edits dangerzones with data from post form
    function confirmEditDangerzones(Request $request) {
        if (auth::user()->admin != 1) {
            return redirect('/dashboard');
        }
        $dangerzone = Dangerzone::where('fishpond_id', $request->id)->where('data_type', $request->dataType)->first();
        var_dump($dangerzone);
        $dangerzone->min = $request->min;
        $dangerzone->max = $request->max;
        $dangerzone->save();
        return redirect('/admin');
    }

    function editSensors(Request $request) {
        if (auth::user()->admin != 1) {
            return redirect('/dashboard');
        }
        $currentFishpond = fishpond::fishpondLatestData($request->id);
        $UnassignedSensors = FishpondSensorDataLog::getUnassignedSensors();
        $UnassignedTemperatureSensors = [];
        $UnassignedOxygenSensors = [];
        $UnassignedTurbiditySensors = [];
        $UnassignedWaterLevelSensors = [];
        if ($UnassignedSensors->first != null) {
            foreach ($UnassignedSensors as $sensor) {
                if ($sensor->value->type == 'temperature') {
                    array_push($UnassignedTemperatureSensors, $sensor);
                } else if ($sensor->value->type == 'oxygen') {
                    array_push($UnassignedOxygenSensors, $sensor);
                } else if ($sensor->value->type == 'turbidity') {
                    array_push($UnassignedTurbiditySensors, $sensor);
                } else if ($sensor->value->type == 'waterLevel') {
                    array_push($UnassignedWaterLevelSensors, $sensor);
                }
            }
        }
        return Inertia::render('AdminFishpondSensor', [
            'fishpond' => $currentFishpond,
            'UnassignedSensors' => $UnassignedSensors,
            'UnassignedTemperatureSensors' => $UnassignedTemperatureSensors,
            'UnassignedOxygenSensors' => $UnassignedOxygenSensors,
            'UnassignedTurbiditySensors' => $UnassignedTurbiditySensors,
            'UnassignedWaterLevelSensors' => $UnassignedWaterLevelSensors,
        ]);
    }

    function confirmEditSensors(Request $request) {
        if (auth::user()->admin != 1) {
            return redirect('/dashboard');
        }
        $currentFishpond = Fishpond::fishpondLatestData($request->id);
        //$sensors = FishpondSensorDataLog::where('fishpond_id', $request->id)->get();
        $temperature = false; $oxygen = false; $turbidity = false; $waterLevel = false;
        foreach ($currentFishpond->sensors as $sensor) {
            if ($sensor->value->type == 'temperature') {
                if ($request->temperature != null) {
                    FishpondSensorDataLog::updateSpecific($sensor->id, $request->temperature, $request->id);
                } else {
                    FishpondSensorDataLog::updateNull($sensor->id);
                }
                $temperature = true;
            } else if ($sensor->value->type == 'oxygen') {
                if ($request->oxygen != null) {
                    FishpondSensorDataLog::updateSpecific($sensor->id, $request->oxygen, $request->id);
                } else {
                    FishpondSensorDataLog::updateNull($sensor->id);
                }
                $oxygen = true;
            } else if ($sensor->value->type == 'turbidity') {
                if ($request->turbidity != null) {
                    FishpondSensorDataLog::updateSpecific($sensor->id, $request->turbidity, $request->id);
                } else {
                    FishpondSensorDataLog::updateNull($sensor->id);
                }
                $turbidity = true;
            } else if ($sensor->value->type == 'waterLevel') {
                if ($request->waterLevel != null) {
                    FishpondSensorDataLog::updateSpecific($sensor->id, $request->waterLevel, $request->id);
                } else {
                    FishpondSensorDataLog::updateNull($sensor->id);
                }
                $waterLevel = true;
            }
        }
        if ($temperature == false) {
            FishpondSensorDataLog::updateFresh($request->temperature, $request->id);
        }
        if ($oxygen == false) {
            FishpondSensorDataLog::updateFresh($request->oxygen, $request->id);
        }
        if ($turbidity == false) {
            FishpondSensorDataLog::updateFresh($request->turbidity, $request->id);
        } 
        if ($waterLevel == false) {
            FishpondSensorDataLog::updateFresh($request->waterLevel, $request->id);
        }
        return redirect('/admin');
    }
}
