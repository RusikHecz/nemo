<?php

declare(strict_types=1);

namespace App\Module\Airport\Providers;

use App\Module\Airport\Contracts\Services\AirportService as AirportServiceContract;
use App\Module\Airport\Services\AirportService;
use Illuminate\Support\ServiceProvider;

class BindServiceProvider extends ServiceProvider
{
    public array $bindings = [
        AirportServiceContract::class => AirportService::class,
    ];
}
