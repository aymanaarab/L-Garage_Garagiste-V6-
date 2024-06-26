<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();
            // dd($user)->isAdmin();
if ($user->isAdmin()){
    return $next($request);
}
else if ($user->isEditor()) {
    return redirect(route('editor_dashboard'));
}
else if ($user->isClient()) {
    return redirect(route('client_dashboard'));
}

        }

        abort(403);
        return $next($request);
    }
}
