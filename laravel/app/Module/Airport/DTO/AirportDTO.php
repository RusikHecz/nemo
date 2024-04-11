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
        $dto->iataCode      = $airport['iataCode'];
        $dto->cityNameRu    = $airport['cityName']['ru'];
        $dto->cityNameEn    = $airport['cityName']['en'];
        $dto->airportNameRu = $airport['airportName']['ru'];
        $dto->airportNameEn = $airport['airportName']['en'];
        $dto->area          = $airport['area'];
        $dto->country       = $airport['country'];
        $dto->latitude      = $airport['latitude'];
        $dto->longitude     = $airport['longitude'];
        $dto->timezone      = $airport['timezone'];

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
