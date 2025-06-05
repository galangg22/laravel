<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckIfBlocked
{
    public function handle(Request $request, Closure $next)
{
    // Skip middleware untuk route callback Midtrans supaya gak kena blokir
    if ($request->is('api/midtrans/callback')) {
        return $next($request);
    }

    // Cek user diblokir atau tidak
    if (Auth::check() && Auth::user()->is_blocked) {
        Auth::logout();
        return redirect()->route('blocked.notice');
    }

    return $next($request);
}

    }
