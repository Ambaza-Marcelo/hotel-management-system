<?php

namespace App\Http\Middleware;

use Closure;

class CheckEmployeeOrCustomer
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
        $user = \Auth::user();
        if ($user->hasRole('employee') || $user->hasRole('customer') ||  $user->hasRole('admin')) {
            return $next($request);
        }
        return redirect('home');
    }
}
