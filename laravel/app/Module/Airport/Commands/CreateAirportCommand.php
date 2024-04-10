<?php

declare(strict_types=1);

namespace App\Module\Airport\Commands;

use App\Module\Airport\DTO\AirportDTO;

final readonly class CreateAirportCommand
{
    public function __construct(public AirportDTO $DTO)
    {
    }
}
