<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isPengelola
{
    public function handle(Request $request, Closure $next)
    {
        $user_role = auth()->user()->role;
        if ($user_role == 'guest' && $user_role == 'investor') {
            return redirect('/admin');
        }
        
        return $next($request);
    }
}