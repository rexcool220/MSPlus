<?php

namespace App\Http\Middleware;

use Closure;
use App\Members;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $fbID = Auth::user()->name;

        $result = Members::WHERE('FBID', $fbID)->first();

        $request->request->add(['permission', $result->Type]);

        if(($result != null) && (($result->Type == '管理員') || ($result->Type == '共用帳號'))){

            return $next($request);
        }

        return redirect('/home');
    }
}
