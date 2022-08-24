<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Company;
use App\Models\Homepage;
use App\Models\NewsBlog;
use App\Models\Program;
use Session;
use Auth;

class load_auth
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
        // if (Auth::check()) {
        // }else {
            $company = Company::find(1);
            $program = Program::all();
            $event = Event::where('del', 'no')->latest()->first();
            $newsblog = NewsBlog::orderBy('id', 'DESC')->where('del', 'no')->limit(2)->get();
            $newsblog6 = NewsBlog::orderBy('id', 'DESC')->where('del', 'no')->limit(6)->get();
            $homepage = Homepage::where('del', 'no')->Latest()->first();
            // $newsblog = 5;
            Session::put('program', $program);
            Session::put('company', $company);
            Session::put('newsblog', $newsblog);
            Session::put('newsblog6', $newsblog6);
            Session::put(['homepage' => $homepage, 'event' => $event]);
            // Session::put('event', $event);
            return $next($request);
            // return redirect('/uiuytyu');
        // }
    }
}
