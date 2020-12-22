<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Rules\BadAge;

class BadAge
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
        
    $content = $request->get('age');
   
    $rule = new BadAge;
    if ($rule->passes('content', $content)) {
      return $next($request);
    }
    return response()->view('forbidden-comment');

    }
}
