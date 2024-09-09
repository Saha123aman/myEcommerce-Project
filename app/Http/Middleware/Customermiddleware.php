<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Client\Customer;
class Customermiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {  if (!Auth::guard('custom')->check()) {
        // Check if the request expects a JSON response
        if ($request->wantsJson()) {
            return response()->json(['error' => 'You must be logged in to access this page.'], 401);
        }
        // Redirect unauthenticated users to the login page
        return redirect('login')->with('error', 'You must be logged in to access this page.');
    }

    // Get the authenticated user
    $user = Auth::guard('custom')->user();

    // Check if the user has the 'is_customer' property and it's true
    if ($user && $user->is_customer) {
        // Ensure the session is started (if really needed)
        // Session::start();
        return $next($request);
    }

    // Handle unauthorized access
    if ($request->wantsJson()) {
        return response()->json(['error' => 'You must be logged in as a customer to access this page.'], 403);
    }
    return redirect('login')->with('error', 'You must be logged in as a customer to access this page.');
}
}
      
    

