<?php

namespace App\Http\Controllers;

use App\Events\CallbackRequested;
use App\Http\Requests\StoreCallbackRequest;
use App\Models\CallbackRequest;

class CallbackController extends Controller
{
    public function store(StoreCallbackRequest $request)
    {
        $callback = CallbackRequest::create($request->validated());

        event(new CallbackRequested($callback));

        session()->flash('success', 'Заявка принята! Мы свяжемся с вами в ближайшее время.');

        return redirect()->back();
    }
}
