<?php

declare(strict_types=1);

namespace App\Module\Airport\Listeners;

use App\Constants\CacheConstants;
use Illuminate\Support\Facades\Cache;

final class AirportCacheClearListener
{
    public function handle($event): void
    {
        Cache::forget(CacheConstants::AIRPORT_ALL_CACHE_KEY);
    }
}
