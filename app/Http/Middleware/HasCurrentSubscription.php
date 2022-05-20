<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Models\User;
use Illuminate\Http\Request;

class HasCurrentSubscription
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(User::where('id', Auth::user()->id)->first()->load('subscription')->subscription != null) {
            if (User::where('id', Auth::user()->id)->first()->load('subscription')->subscription->stops_at == null && Auth::user()->admin == 0 ) {
                return redirect('/subscription');
            } else if (strtotime(User::where('id', Auth::user()->id)->first()->load('subscription')->subscription->stops_at) < strtotime(date("Y-m-d H:i:s")) && Auth::user()->admin == 0 ) {
                return redirect('/subscription');
            }
        }
        return $next($request);
    }
}
