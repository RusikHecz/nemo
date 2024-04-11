<?php

namespace App\Module\Airport\Providers;

use App\Module\Airport\Events\AirportCreatedEvent;
use App\Module\Airport\Listeners\AirportCacheClearListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        AirportCreatedEvent::class => [
            AirportCacheClearListener::class,
        ],
    ];
}
