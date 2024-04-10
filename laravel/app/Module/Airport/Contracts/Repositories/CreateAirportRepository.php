<?php

declare(strict_types=1);

namespace App\Module\Airport\Contracts\Repositories;

use App\Module\Airport\Models\Airport;

interface CreateAirportRepository
{
    public function create(Airport $model);
}
