<?php

namespace App\Providers;

use App\Events\CallbackRequested;
use App\Listeners\SendCallbackNotification;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Event::listen(
            CallbackRequested::class,
            SendCallbackNotification::class,
        );
    }
}
