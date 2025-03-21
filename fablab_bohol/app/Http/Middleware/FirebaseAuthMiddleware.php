<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class FirebaseAuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('firebase_uid')) {
            return redirect('/login');
        }

        return $next($request);
    }
}
