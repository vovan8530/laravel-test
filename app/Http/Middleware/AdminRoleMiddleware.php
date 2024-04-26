<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminRoleMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->role !== 1) {
            return redirect()->route('home');
        }
        return $next($request);
    }
}
