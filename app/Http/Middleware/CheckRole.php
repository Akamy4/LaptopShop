<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next)
    {
        session()->start();
        dd(session()->all());
        if(session('user') !== 1) {
            abort(403, 'Access denied');
        }
        return $next($request);
    }
}
