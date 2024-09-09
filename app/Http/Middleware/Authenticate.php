<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Authenticate
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        if (!Auth::guard('web')->check()) {
            // \Log::info('Unauthorized access attempt to: ' . $request->url());
            return redirect()->route('login')->with('error', 'Please login first');
        }
        

    
            return $next($request);
        
    }
}
