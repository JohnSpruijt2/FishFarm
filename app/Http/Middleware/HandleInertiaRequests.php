<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;
use Illuminate\Support\Facades\Auth;
use App\Models\Wallet;
class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request): array
    {
        if (Auth::user() != null) {
            if (Wallet::where('user_id', Auth::user()->id)->first() != null) {
                return array_merge(parent::share($request), [
                    //
                    'isAdmin' => Auth::user()->admin,
                    'navCredits' => Wallet::where('user_id', Auth::user()->id)->first()->credits,
                ]); 
            } else {
                return array_merge(parent::share($request), [
                    //
                    'isAdmin' => Auth::user()->admin,
                    'navCredits' => 0,
                ]); 
            }
             
        } else {
            return array_merge(parent::share($request), [
                //
                'isAdmin' => 0,
                'navCredits' => 0,
            ]);  
        }
        
    }
}
