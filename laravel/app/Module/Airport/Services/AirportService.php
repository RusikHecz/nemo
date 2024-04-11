<?php

declare(strict_types=1);

namespace App\Module\Airport\Services;

use App\Module\Airport\Contracts\Queries\AirportQuery;
use App\Module\Airport\Contracts\Services\AirportService as AirportServiceContract;
use App\Module\Airport\DTO\AirportDTO;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

final readonly class AirportService implements AirportServiceContract
{
    public function __construct(
        private AirportQuery $query
    ) {
    }

    public function getAll(AirportDTO $dto): LengthAwarePaginator
    {
        return $this->query->paginate($dto);
    }
}
