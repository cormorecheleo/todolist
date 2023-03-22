<?php

namespace App\Listeners;

use App\Events\TodoCreatedEvent;
use App\Mail\HelloMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class TodoEventListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(TodoCreatedEvent $event): void
    {
        Log::info('Create todo'.$event->todo);
        Mail::to("test@test.com")->send(new HelloMail($event->todo));
    }
}
