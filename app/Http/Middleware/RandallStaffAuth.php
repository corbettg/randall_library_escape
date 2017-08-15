<?php

namespace App\Http\Middleware;

use Closure;

class RandallStaffAuth
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
      $redirectLink = action('PagesController@index');
      if (!randallAuthAdmin()) {
        return redirect($redirectLink);
      }
      return $next($request);
    }
}
