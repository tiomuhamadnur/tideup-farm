<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isGuest
{
    public function handle(Request $request, Closure $next)
    {
        $user_role = auth()->user()->role;
        if ($user_role == 'guest') {
            return redirect('/dashboard-guest')->with([
                'alert-type' => 'info',
                'message' => 'Status akun anda sebagai guest!',
            ]);
        }
        return $next($request);
    }
}