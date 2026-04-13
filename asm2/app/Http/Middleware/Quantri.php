<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Quantri
{
    public function handle(Request $request, Closure $next): Response
    {
        if ((int) $request->user()?->idgroup !== 1) {
            return redirect()
                ->route('categories.index')
                ->with('error', 'Bạn không có quyền truy cập khu vực quản trị user.');
        }

        return $next($request);
    }
}
