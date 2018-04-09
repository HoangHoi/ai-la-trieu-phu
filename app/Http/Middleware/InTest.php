<?php

namespace App\Http\Middleware;

use Closure;

class InTest
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
        if (!$request->session()->exists('test')) {
            if ($request->ajax()) {
                return ['status' => config('status.no_test'), 'redirect_to' => route('home')];
            }

            return redirect()->route('home');
        }
        return $next($request);
    }
}
