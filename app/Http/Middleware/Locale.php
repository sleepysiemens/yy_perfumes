<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Stevebauman\Location\Facades\Location;
use Symfony\Component\HttpFoundation\Response;

class Locale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Session::has('locale')) {
            $lang = Session::get('locale');
            App::setLocale($lang);
        } else {
            // Определяем язык автоматом
            App::setLocale(Str::lower($this->getLocation()->countryCode));
        }

        return $next($request);
    }

    public function getLocation(): \Stevebauman\Location\Position|bool
    {
        $ip = $_SERVER['REMOTE_ADDR'] != '127.0.0.1' ? $_SERVER['REMOTE_ADDR'] : '78.106.93.5';
        return Location::get($ip);
    }
}
