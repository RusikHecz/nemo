<?php

declare(strict_types=1);

namespace App\Module\Airport\DTO;

use App\Constants\PageConstants;
use App\Module\Airport\Requests\AirportRequest;

final class AirportDTO
{
    public ?string $iataCode = null;
    public ?string $cityNameRu = null;
    public ?string $cityNameEn = null;
    public ?string $airportNameRu = null;
    public ?string $airportNameEn = null;
    public ?string $area = null;
    public ?string $country = null;
    public ?string $latitude = null;
    public ?string $longitude = null;
    public ?string $timezone = null;
    public int $limit;
    public int $page;

    public static function fromArray(array $airport): self
    {
        $dto                = new self();
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

    public static function fromRequest(AirportRequest $request): self
    {
        $self                = new self();
        $self->airportNameRu = $request->get('airportNameRu');
        $self->limit         = (int)$request->get('limit', PageConstants::LIMIT_FOR_PAGE);
        $self->page          = (int)$request->get('page', PageConstants::DEFAULT_PAGE);

        return $self;
    }

    public static function getInstance(): self
    {
        $self        = new self();
        $self->limit = PageConstants::LIMIT_FOR_PAGE;
        $self->page  = PageConstants::DEFAULT_PAGE;

        return $self;
    }
}
