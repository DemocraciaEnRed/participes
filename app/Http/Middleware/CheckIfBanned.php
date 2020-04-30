<?php

namespace Vanguard\Http\Middleware;

use Closure;

class CheckIfBanned
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
        if ($request->user() && $request->user()->isBanned()) {
            abort(403, __("Your account is banned by administrator."));
        }

        return $next($request);
    }
}
