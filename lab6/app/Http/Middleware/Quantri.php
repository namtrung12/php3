<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Quantri
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! $request->user()) {
            return redirect()->route('login');
        }

        if ((int) $request->user()->idgroup !== 1) {
            return redirect()
                ->route('dashboard')
                ->with('error', 'Bạn không có quyền vào khu vực quản trị.');
        }

        return $next($request);
    }
}
