<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClientMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! $request->user()) {
            return redirect()
                ->route('login')
                ->with('error', 'Vui lòng đăng nhập để xem chi tiết sản phẩm.');
        }

        return $next($request);
    }
}
