<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Module\Airport\Commands\CreateAirportCommand;
use App\Module\Airport\DTO\AirportDTO;
use Illuminate\Console\Command;

final class CreateAirportsFromJsonFileCommand extends Command
{
    protected $signature = 'create:airports-from-json';

    protected $description = 'Сохранения данных из json file в таблицу airports';

    public function handle(): void
    {
        $path = storage_path('files/airports.json');

        $airportsArray = json_decode(file_get_contents($path), true);

        $count = count($airportsArray);

        $this->info("Найдено $count");

        $progressBar = $this->output->createProgressBar($count);

        collect($airportsArray)->each(function ($airportData, $iataCode) use ($progressBar) {
            try {
                $dto           = AirportDTO::fromArray($airportData);
                $dto->iataCode = $iataCode;

                dispatch(new CreateAirportCommand($dto));

                $progressBar->advance();
            } catch (\Throwable $exception) {
                $this->error("Ошибка при создании аэропорта: " . $exception->getMessage());
            }
        });

        $progressBar->finish();
    }
}
