<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RestrictScriptsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $input = $request->all();
        $this->stripScripts($input);

        $request->replace($input);

        return $next($request);
    }

    protected function stripScripts(&$array)
    {
        foreach ($array as &$value) {
            if (is_array($value)) {
                $this->stripScripts($value);
            } else {
                $value = strip_tags($value);
            }
        }
    }
}
