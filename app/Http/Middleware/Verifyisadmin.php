<?php

namespace App\Http\Middleware;

use isadmin;
use Closure;
use Illuminate\Http\Request;

class Verifyisadmin
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
        if (!auth()->user()->role != 'admin') {
            return redirect()->back();
        }
        return $next($request);
    }
}
