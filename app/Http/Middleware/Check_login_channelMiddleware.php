<?php

namespace App\Http\Middleware;

use Closure;

class Check_login_channelMiddleware
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
      $check=  $request->cookie('check_log_channel');


    if (!empty($check)){

      return $next($request);
    }
    return redirect('/');
  }
    }
