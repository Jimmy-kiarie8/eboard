<?php

namespace App\Http\Middleware;
use Illuminate\Cookie\Middleware\EncryptCookies as Middleware;

use Closure;
use Auth;

class AdminMiddleware extends Middleware
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
        // foreach (Auth::user()->role as $role) {
        //     if ($role->name == 'Admin') {
                return $next($request);
        //     }
        // }
        // return redirect('/login');
    }
}
