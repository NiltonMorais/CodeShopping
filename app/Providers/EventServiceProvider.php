<?php

namespace CodeShopping\Providers;

use CodeShopping\Events\UserCreatedEvent;
use CodeShopping\Listeners\SendMailToDefinePassword;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        UserCreatedEvent::class => [
            SendMailToDefinePassword::class
        ]
    ];

    public function boot()
    {
        parent::boot();

        //
    }
}
