<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $roles = collect($roles)
            ->flatMap(fn (string $role) => explode('|', $role))
            ->map(fn (string $role) => trim($role))
            ->filter()
            ->all();

        $user = Auth::user();

        if (!$user || !in_array($user->role, $roles, true)) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
