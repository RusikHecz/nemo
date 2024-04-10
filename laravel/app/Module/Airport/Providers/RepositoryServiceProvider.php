<?php

declare(strict_types=1);

namespace App\Module\Airport\Providers;

use App\Module\Airport\Contracts\Repositories\CreateAirportRepository;
use App\Module\Airport\Repositories\Eloquent\AirportRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public array $bindings = [
        CreateAirportRepository::class => AirportRepository::class,
    ];
}
