<?php

namespace App\Providers;

use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Illuminate\Auth\Events\Registered;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        Event::listen(Registered::class, function (Registered $event): void {
            Log::info('User dang ky moi', ['email' => $event->user->email]);
        });

        Event::listen(Login::class, function (Login $event): void {
            Log::info('User dang nhap', ['email' => $event->user->email]);
        });

        Event::listen(Logout::class, function (Logout $event): void {
            if ($event->user) {
                Log::info('User dang xuat', ['email' => $event->user->email]);
            }
        });
    }
}
