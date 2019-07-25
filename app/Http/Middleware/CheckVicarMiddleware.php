<?php

namespace App\Http\Middleware;

use Closure;

class CheckVicarMiddleware
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
      $checkModir=  $request->cookie('checkModir');
      if (!empty($checkModir && $checkModir<=2)){
        return $next($request);
      }
      elseif (!empty($check)){
        return redirect('/dashbordAdmin');
      }
      else{
        return redirect('/');
      }
    }
}
