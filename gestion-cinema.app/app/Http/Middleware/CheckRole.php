<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole {
    public function handle($request, Closure $next, ...$roles) {
        if (!in_array(Auth::user()->rôle, $roles)) {
            abort(403);
        }
        return $next($request);
    }
}