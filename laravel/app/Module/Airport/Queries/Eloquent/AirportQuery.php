<?php

declare(strict_types=1);

namespace App\Module\Airport\Queries\Eloquent;

use App\Module\Airport\Contracts\Queries\AirportQuery as AirportQueryContract;
use App\Module\Airport\DTO\AirportDTO;
use App\Module\Airport\Models\Airport;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;

final class AirportQuery implements AirportQueryContract
{
    public function paginate(AirportDTO $DTO): LengthAwarePaginator
    {
        return Airport::query()
            ->when($DTO->airportNameRu, fn(Builder $query) => $query->where('airport_name_ru', 'LIKE', "%$DTO->airportNameRu%"))
            ->paginate($DTO->limit, ['*'], 'page', $DTO->page);
    }
}
