<?php

namespace App\Events;

use App\Models\CallbackRequest;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CallbackRequested
{
    use Dispatchable, SerializesModels;

    public function __construct(
        public CallbackRequest $callbackRequest
    ) {}
}
