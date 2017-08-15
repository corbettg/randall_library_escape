<?php

namespace App\Http\Middleware;

use Closure;

class RandallAuth
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
      $loginLink = action('RandallAuthController@login');
      if (!randallAuth()) {
        return redirect($loginLink);
      }
      return $next($request);
    }
}
