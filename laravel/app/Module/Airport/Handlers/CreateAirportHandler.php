<?php

declare(strict_types=1);

namespace App\Module\Airport\Handlers;

use App\Module\Airport\Commands\CreateAirportCommand;
use App\Module\Airport\Contracts\Repositories\CreateAirportRepository;
use App\Module\Airport\Events\AirportCreatedEvent;
use App\Module\Airport\Models\Airport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Exception;

final readonly class CreateAirportHandler
{
    public function __construct(
        private CreateAirportRepository $repository,
    ) {
    }

    public function handle(CreateAirportCommand $command): void
    {
        $airport = null;

        try {
            DB::transaction(function () use ($command, &$airport) {
                $airport                  = new Airport();
                $airport->iata_code       = $command->DTO->iataCode;
                $airport->city_name_ru    = $command->DTO->cityNameRu;
                $airport->city_name_en    = $command->DTO->cityNameEn;
                $airport->airport_name_ru = $command->DTO->airportNameRu;
                $airport->airport_name_en = $command->DTO->airportNameEn;
                $airport->area            = $command->DTO->area;
                $airport->country         = $command->DTO->country;
                $airport->latitude        = $command->DTO->latitude;
                $airport->longitude       = $command->DTO->longitude;
                $airport->timezone        = $command->DTO->timezone;

                $this->repository->create($airport);
            });
        } catch (Exception $e) {
            Log::info("Ошибка при создании аэропорта {$command->DTO->iataCode}: {$e->getMessage()}");
        }

        event(new AirportCreatedEvent($airport->id));
    }
}
