<?php

declare(strict_types=1);

namespace App\Module\Airport\Providers;

use App\Module\Airport\Contracts\Queries\AirportQuery as AirportQueryContract;
use App\Module\Airport\Queries\Cache\AirportQuery as AirportCacheQuery;
use App\Module\Airport\Queries\Eloquent\AirportQuery;
use Illuminate\Support\ServiceProvider;

final class QueryServiceProvider extends ServiceProvider
{
    public array $bindings = [
        AirportQueryContract::class => AirportCacheQuery::class,
    ];

    public function register(): void
    {
        $this->app->when(AirportCacheQuery::class)
            ->needs(AirportQueryContract::class)
            ->give(AirportQuery::class);
    }
}
