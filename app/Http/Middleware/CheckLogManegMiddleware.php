<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogManegMiddleware
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
      $check=  $request->cookie('checkLogManeg');


    if (!empty($check)){
      return $next($request);
    }
    return redirect('/');
    }
}
