<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\DangerWarning;
use App\Models\Fishpond;
use App\Models\MailingList;
use App\Models\User;

class DashboardController extends Controller
{
    //
    function index(Request $request) {
        $data = fishpond::all()->load('dangerzones')->load('latestTemperature')->load('latestOxygenLevel')->load('latestTurbidityLevel')->load('latestWaterLevel');
        //$this->mailerLoop($data);
        return Inertia::render('Dashboard', [
            'data' => $data,
        ]);
    }

    protected function mailerLoop($data) {
         foreach ($data as $key) {
            foreach ($key->dangerzones as $dangerzone) {
                if ($dangerzone->data_type == 'temperature') {
                    if ($key->latestTemperature->temperature > $dangerzone->max) {
                        $this->mailerSendout($key, 'temperature', 'çritical');
                    } else if ($key->latestTemperature->temperature < $dangerzone->min){
                        $this->mailerSendout($key, 'temperature', 'çritical');
                    } else if ($key->latestTemperature->temperature > $dangerzone->max-5) {
                        $this->mailerSendout($key, 'temperature');
                    } else if ($key->latestTemperature->temperature < $dangerzone->min+5) {
                        $this->mailerSendout($key, 'temperature');
                    }
                } else if ($dangerzone->data_type == 'oxygen') {
                    if ($key->latestOxygenLevel->oxygen_level > $dangerzone->max) {
                        $this->mailerSendout($key, 'oxygen', 'çritical');
                    } else if ($key->latestOxygenLevel->oxygen_level < $dangerzone->min){
                        $this->mailerSendout($key, 'oxygen', 'çritical');
                    } else if ($key->latestOxygenLevel->oxygen_level > $dangerzone->max-2){
                        $this->mailerSendout($key, 'oxygen');
                    } else if ($key->latestOxygenLevel->oxygen_level < $dangerzone->min+2){
                        $this->mailerSendout($key, 'oxygen');
                    }
                } else if ($dangerzone->data_type == 'turbidity') {
                    if ($key->latestTurbidityLevel->ntu > $dangerzone->max) {
                        $this->mailerSendout($key, 'turbidity', 'çritical');
                    } else if ($key->latestTurbidityLevel->ntu < $dangerzone->min){
                        $this->mailerSendout($key, 'turbidity', 'çritical');
                    } else if ($key->latestTurbidityLevel->ntu > $dangerzone->max-0.5){
                        $this->mailerSendout($key, 'turbidity');
                    } else if ($key->latestTurbidityLevel->ntu < $dangerzone->min+0.5){
                        $this->mailerSendout($key, 'turbidity');
                    }
                } else if ($dangerzone->data_type == 'level') {
                    if ($key->latestWaterLevel->cm > $dangerzone->max) {
                        $this->mailerSendout($key, 'level', 'çritical');
                    } else if ($key->latestWaterLevel->cm < $dangerzone->min){
                        $this->mailerSendout($key, 'level', 'çritical');
                    } else if ($key->latestWaterLevel->cm > $dangerzone->max-10){
                        $this->mailerSendout($key, 'level');
                    }
                     else if ($key->latestWaterLevel->cm < $dangerzone->min+10){
                        $this->mailerSendout($key, 'level');
                    }
                }
            }
        }
    }

    protected function mailerSendout($key, $type, $crit=null) {
        $mailingList = MailingList::all();
        foreach ($mailingList as $mList) {
            if ($mList->fishpond_id == $key->id) {
                Mail::to(User::where('id', $mList->user_id)->first())->send(new DangerWarning ($key, $type, $crit));
            }
        }
    }
}
