<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use Closure;
use Illuminate\Http\Request;

class AdminLogin
{
    public function handle(Request $request, Closure $next): mixed
    {
        if (Admin::isLogin()) {
            return redirect()->route('AdminMainPage');
        }
        return $next($request);
    }
}
