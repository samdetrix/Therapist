<?php

namespace App\Http\Middleware;

use Closure;

class userSession
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle($request, Closure $next)
    {
        if (Session('token')) {
            if (Session('role') == 'Admin') {
                return $next($request);
            }
        }
        return redirect()->route('login.page')->with('error', 'You Must be a Therapist to access this site. Kindly login');
    }
}
