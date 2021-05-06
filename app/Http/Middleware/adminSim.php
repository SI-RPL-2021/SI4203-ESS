<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class adminSim
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
        if (auth()->user()->level === 'admin sim') {
            return $next($request);
        }
        return redirect()->route('home');
    }
}
