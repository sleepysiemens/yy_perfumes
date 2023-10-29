<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Dealer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!\Auth::check() || \Auth::user()->type != 'dealer') {
            return redirect('/');
        }

        if (\Auth::user()->active === false && $request->path() !== 'dealer/dashboard') {
            return redirect()->route('dealer.dashboard');
        }

        return $next($request);
    }
}
