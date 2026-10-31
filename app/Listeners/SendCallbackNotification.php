<?php

namespace App\Listeners;

use App\Events\CallbackRequested;
use Illuminate\Support\Facades\Log;

class SendCallbackNotification
{
    public function handle(CallbackRequested $event): void
    {
        $callback = $event->callbackRequest;
        Log::info("Новая заявка на звонок #{$callback->id}: {$callback->name}, {$callback->phone}");
    }
}
