<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\DailyStatistic;
class TrackVisitorAndView
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $date = Carbon::now()->toDateString();

        $statistic = DailyStatistic::firstOrCreate(['date' => $date]);

        if (!$request->session()->has('visited_today')) {
            $statistic->increment('visitors');
            $request->session()->put('visited_today', true);
        }

        // Check if the user has already viewed this page
        $pageIdentifier = 'viewed_' . $request->url(); // unique identifier for the page
        if (!$request->session()->has($pageIdentifier)) {
            $statistic->increment('views');
            $request->session()->put($pageIdentifier, true);
        }

        return $next($request);
    }
}
