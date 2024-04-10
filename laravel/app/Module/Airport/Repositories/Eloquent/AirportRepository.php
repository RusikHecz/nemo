<?php

declare(strict_types=1);

namespace App\Module\Airport\Repositories\Eloquent;

use App\Module\Airport\Contracts\Repositories\CreateAirportRepository;
use App\Module\Airport\Models\Airport;
use Throwable;

final class AirportRepository implements CreateAirportRepository
{
    /**
     * @throws Throwable
     */
    public function create(Airport $model): void
    {
        $model->saveOrFail();
    }
}
