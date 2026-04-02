<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Gate;

class AbroadMiddleware
{
    public function handle(Request $request, Closure $next, ...$permissions)
    {
        // যদি ইউজার Super Admin হয়, তাহলে সব অ্যাক্সেস দাও
        if (Auth::check() && Auth::user()->role === 'superadmin') {
            return $next($request);
        }

        // নির্দিষ্ট পারমিশন চেক করা
        foreach ($permissions as $permission) {
            if (Gate::allows($permission)) {
                return $next($request);
            }
        }

        abort(403, 'Unauthorized access.');
    }
}
