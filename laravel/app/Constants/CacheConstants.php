<?php

declare(strict_types=1);

namespace App\Constants;

final class CacheConstants
{
    public const CACHE_TTL_DAY = 86400;

    public const AIRPORT_ALL_CACHE_KEY = 'airport-all-key';

    public static function getCacheKeyById(string $key, int|string $id): string
    {
        return "{$key}-{$id}";
    }
}
