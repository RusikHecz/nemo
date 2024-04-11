<?php

declare(strict_types=1);

namespace App\Module\Airport\Contracts\Queries;

use App\Module\Airport\DTO\AirportDTO;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface AirportQuery
{
    public function paginate(AirportDTO $DTO): LengthAwarePaginator;
}
