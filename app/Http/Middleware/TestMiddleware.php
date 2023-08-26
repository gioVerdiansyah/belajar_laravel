<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // dd("Testing Middleware aktif"); //Maka semua akan menerapkan "Test Middleware aktif" ini

        // ! Redirect Middleware
        // Biasanya middleware ini akan me-redirect user ke halaman lain jika suatu kondisi tidak terpenuhi.

        if (time() % 2 == 0) {
            return redirect()->route('middleware.tabelMahasiswa');
        }

        return $next($request);
    }
}