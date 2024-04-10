<?php

namespace Database\Factories;

use App\Module\Airport\Models\Airport;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Airport>
 */
class AirportFactory extends Factory
{
    protected $model = Airport::class;

    public function definition(): array
    {
        return [
	        'iata_code'       => $this->faker->unique()->word,
	        'city_name_ru'    => $this->faker->city,
	        'city_name_en'    => $this->faker->city,
	        'airport_name_ru' => $this->faker->word,
	        'airport_name_en' => $this->faker->word,
	        'area'            => $this->faker->word,
	        'country'         => $this->faker->country,
	        'latitude'        => $this->faker->latitude,
	        'longitude'       => $this->faker->longitude,
	        'timezone'        => $this->faker->timezone,
        ];
    }
}
