<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    public function handle($request, Closure $next, ...$roles)
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        $userRole = strtolower(auth()->user()->role);
        $roles = array_map('strtolower', $roles);

        if (!in_array($userRole, $roles)) {
            abort(403, 'Anda tidak memiliki akses.');
        }

        return $next($request);
    }

}
