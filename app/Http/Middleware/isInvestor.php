<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isInvestor
{
    public function handle(Request $request, Closure $next)
    {
        $user_role = auth()->user()->role;
        if ($user_role != 'investor') {
            return back()->with([
                'alert-type' => 'error',
                'message' => 'Anda bukan investor!',
            ]);
        }

        return $next($request);
    }
}