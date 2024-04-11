<?php

declare(strict_types=1);

namespace App\Module\Airport\Contracts\Services;

use App\Module\Airport\DTO\AirportDTO;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface AirportService
{
    public function getAll(AirportDTO $dto): LengthAwarePaginator;
}
