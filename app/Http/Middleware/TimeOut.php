<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;

class TimeOut
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
        $now = Carbon::now();
        if ($request->session()->exists('test')) {
            $endTime = Carbon::parse(session()->get('end_time', $now->toDateTimeString()));
            if ($endTime->gt($now)) {
                return $next($request);
            }
        }

        if ($request->ajax()) {
            return ['status' => config('status.time_out'), 'redirect_url' => route('home')];
        }

        return redirect()->route('home');
    }
}
