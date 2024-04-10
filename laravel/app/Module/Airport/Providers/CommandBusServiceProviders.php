<?php

declare(strict_types=1);

namespace App\Module\Airport\Providers;

use App\Module\Airport\Commands\CreateAirportCommand;
use App\Module\Airport\Handlers\CreateAirportHandler;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\ServiceProvider;

class CommandBusServiceProviders extends ServiceProvider
{
    public function boot(): void
    {
        Bus::map([
            CreateAirportCommand::class => CreateAirportHandler::class,
        ]);
    }
}
