<?php

declare(strict_types=1);

namespace App\Module\Airport\Queries\Cache;

use App\Constants\CacheConstants;
use App\Constants\PageConstants;
use App\Module\Airport\Contracts\Queries\AirportQuery as AirportQueryContract;
use App\Module\Airport\DTO\AirportDTO;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;

final readonly class AirportQuery implements AirportQueryContract
{
    public function __construct(
        private AirportQueryContract $cityQuery
    ) {
    }

    public function paginate(AirportDTO $DTO): LengthAwarePaginator
    {
        if ($DTO->limit === PageConstants::LIMIT_FOR_PAGE) {
            return Cache::remember(CacheConstants::AIRPORT_ALL_CACHE_KEY, CacheConstants::CACHE_TTL_DAY, fn() => $this->cityQuery->paginate(AirportDTO::getInstance()));
        }

        return $this->cityQuery->paginate($DTO);
    }
}
