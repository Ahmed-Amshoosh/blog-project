<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageSwitcher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        {
            // Check if the language is already set in the session
            if (Session::has('locale')) {
                App::setLocale(Session::get('locale'));
            }

            // Check if the language is provided in the request
            if ($request->has('lang')) {
                $locale = $request->get('lang');
                Session::put('locale', $locale);
                App::setLocale($locale);
            }

            return $next($request);
        }
    }
}
