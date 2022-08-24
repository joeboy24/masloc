<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class student_auth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // if (auth()->user()->status != 'Student') {
        //     return redirect('/');
        // }
        // return $next($request);

        if (Auth::check() && Auth::user()->status == 'Student') {
            return $next($request);
        }else {
            return redirect(url()->previous());
            abort(403);
        }
    }
}
