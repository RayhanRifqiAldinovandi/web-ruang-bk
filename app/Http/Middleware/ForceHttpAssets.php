<?php 
namespace App\Http\Middleware;
use Illuminate\Http\Request;

use Closure;

class ForceHttpsAssets
{
    public function handle(Request $request, Closure $next)
    {
        if (! $request->secure()) {
            $url = $request->url();
            $httpsUrl = str_replace('http:', 'https:', $url);
            return redirect($httpsUrl);
        }

        return $next($request);
    }
}