<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, $roles)
    {
        $roles = explode(',', $roles);

        if (! $request->user() || ! in_array($request->user()->role, $roles)) {
            // Redirect users without the required role.
            return redirect()->route('backend.login');
        }

        return $next($request);
    }
}
