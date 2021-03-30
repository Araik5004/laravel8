<?php
namespace App\Http\Middleware;
use Closure;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if( ! \App\Models\Admin::isLogin() ){
            return redirect()->route('LoginPageAdmin');
        }
        return $next($request);
    }
}
