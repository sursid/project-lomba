<?php

namespace App\Http\Middleware;  // Ubah namespace ini

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class MemberMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Check if user has member role
        if (Auth::user()->role !== 'member') {
            abort(403, 'Unauthorized. Member access only.');
        }

        return $next($request);
    }
}