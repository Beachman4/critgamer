<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
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
        if (\Users::isSignedIn()) {
            $user = \Users::Get();
            if ($user->admin) {
                return $next($request);
            }
            return redirect()->route('admin_login');
        }
        return redirect()->route('admin_login');
    }
}
