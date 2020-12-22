<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Rules\BadAge;


class BadAgeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        
    $age = $request->get('age');
   
    $rule = new BadAge;
    if ($rule->passes('age', $age)) {
      return $next($request);
    }
    
    return response()->view('partials.error');

    }
}
