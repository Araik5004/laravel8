<?php

namespace App\Http\Middleware;

use App\Models\Admin as AdminAlias;
use Closure;
use Illuminate\Http\Request;

class Admin
{
    /**
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ( ! AdminAlias::isLogin()) {
            return redirect()->route('LoginPageAdmin');
        }
        return $next($request);
    }
}
