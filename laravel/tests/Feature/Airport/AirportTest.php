<?php

declare(strict_types=1);

namespace Tests\Feature\Airport;

use App\Libraries\Codes\ResponseCodes;
use App\Module\Airport\Commands\CreateAirportCommand;
use App\Module\Airport\DTO\AirportDTO;
use App\Module\Airport\Models\Airport;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

final class AirportTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testCreateAirport()
    {
        /** @var Airport $airport */
        $airport = Airport::factory()->make(['id' => 1]);

        $dto                = new AirportDTO();
        $dto->iataCode      = $airport->iata_code;
        $dto->cityNameRu    = $airport->city_name_ru;
        $dto->cityNameEn    = $airport->city_name_en;
        $dto->airportNameRu = $airport->airport_name_ru;
        $dto->airportNameEn = $airport->airport_name_en;
        $dto->area          = $airport->area;
        $dto->country       = $airport->country;
        $dto->latitude      = $airport->latitude;
        $dto->longitude     = $airport->longitude;
        $dto->timezone      = $airport->timezone;

        dispatch(new CreateAirportCommand($dto));

        $this->assertDatabaseHas('airports', [
            'id'              => $airport->id,
            'iata_code'       => $dto->iataCode,
            'city_name_ru'    => $dto->cityNameRu,
            'city_name_en'    => $dto->cityNameEn,
            'airport_name_ru' => $dto->airportNameRu,
            'airport_name_en' => $dto->airportNameEn,
            'area'            => $dto->area,
            'country'         => $dto->country,
            'latitude'        => $dto->latitude,
            'longitude'       => $dto->longitude,
            'timezone'        => $dto->timezone,
        ]);
    }

    public function testGetCountries()
    {
        $airports = Airport::factory(5)->create();

        $response = $this->get(route('airports.index'));

        $response->assertStatus(ResponseCodes::SUCCESS)
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'iataCode',
                        'cityNameRu',
                        'cityNameEn',
                        'airportNameRu',
                        'airportNameEn',
                        'area',
                        'country',
                        'latitude',
                        'longitude',
                        'timezone',
                    ]
                ],
            ])
            ->assertJsonPath('data.*.id', $airports->pluck('id')->toArray());
    }
}
