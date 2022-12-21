<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isAdmin
{
    public function handle(Request $request, Closure $next)
    {
        $user_role = auth()->user()->role;
        if ($user_role != 'admin') {
            return back()->with([
                'alert-type' => 'error',
                'message' => 'Anda bukan admin!',
            ]);
        }

        return $next($request);
    }
}