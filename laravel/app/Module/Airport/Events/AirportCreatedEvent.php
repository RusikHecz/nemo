<?php

declare(strict_types=1);

namespace App\Module\Airport\Events;

final readonly class AirportCreatedEvent
{
    public function __construct(
        public int $airportId,
    ) {
    }
}
