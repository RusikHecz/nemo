<?php

declare(strict_types=1);

namespace App\Module\Airport\DTO;

final class AirportDTO
{
    public ?string $iataCode;
    public ?string $cityNameRu;
    public ?string $cityNameEn;
    public ?string $airportNameRu;
    public ?string $airportNameEn;
    public ?string $area;
    public ?string $country;
    public ?string $latitude;
    public ?string $longitude;
    public ?string $timezone;

    public static function fromArray(array $airport): self
    {
        $dto                = new self();
        $dto->iataCode      = $airport['iataCode'] ?? null;
        $dto->cityNameRu    = $airport['cityName']['ru'] ?? null;
        $dto->cityNameEn    = $airport['cityName']['en'] ?? null;
        $dto->airportNameRu = $airport['airportName']['ru'] ?? null;
        $dto->airportNameEn = $airport['airportName']['en'] ?? null;
        $dto->area          = $airport['area'] ?? null;
        $dto->country       = $airport['country'] ?? null;
        $dto->latitude      = $airport['latitude'] ?? null;
        $dto->longitude     = $airport['longitude'] ?? null;
        $dto->timezone      = $airport['timezone'] ?? null;

        return $dto;
    }
}
