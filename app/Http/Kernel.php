<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array<int, class-string|string>
     */
    protected $middleware = [
            // Berisi daftar middleware global yang selalu aktif untuk setiap request
            // \App\Http\Middleware\TrustHosts::class,
        \App\Http\Middleware\TrustProxies::class,
        \Illuminate\Http\Middleware\HandleCors::class,
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class,
            // Middleware ini dipakai untuk membuat Laravel masuk ke maintenance mode, dimana halaman web tidak bisa diakses dari luar. Ini cocok dipakai ketika kita ingin melakukan maintenance atau pengelolaan aplikasi yang sudah berjalan.

            //! Untuk mengaktifkan maintenance mode, bisa dilakukan dari cmd dengan perintah berikut:
            // php artisan down
            // untuk mengaktifkan kembali tinggal ganti menjadi up

            // Namun jika misal ada halaman Admin yang tidak boleh di tutup maka bisa:
            // php artisan down --secret="<alamat_url>"
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array<string, array<int, class-string|string>>
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
                // \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            \Illuminate\Routing\Middleware\ThrottleRequests::class . ':api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        // Jika diletakkan di dalam "web" maka akan selalu aktif jika ada yang meminta request di web, sedangkan "api" akan aktif jika ada request dari API
    ];

    /**
     * The application's middleware aliases.
     *
     * Aliases may be used instead of class names to conveniently assign middleware to routes and groups.
     *
     * @var array<string, class-string|string>
     */
    protected $middlewareAliases = [
        // Berisi daftar middleware opsional yang aktif untuk route tertentu saja.
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
        'signed' => \App\Http\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
        // ! Mendaftarkan middleware yang saya buat
        'test' => \App\Http\Middleware\TestMiddleware::class,
        // Perlu di aktifkan dulu. Ada 2 cara untuk me aktifkan middleware ini
        // 1. dari Route itu sendiri
        // 2. dari Controller

        // Khasus login
        'login' => \App\Http\Middleware\CekLogin::class
    ];
}