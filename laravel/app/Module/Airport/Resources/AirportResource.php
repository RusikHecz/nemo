<?php

declare(strict_types=1);

namespace App\Module\Airport\Resources;

use App\Http\Resources\BaseJsonResource;
use App\Module\Airport\Models\Airport;

/**
 * @OA\Schema(
 *     @OA\Property(property="id",type="integer",description="ID аэропорта",example=1),
 *     @OA\Property(property="iataCode",type="string",description="IATA код аэропорта",example="SVO"),
 *     @OA\Property(property="cityNameRu",type="string",description="Название города на русском",example="Москва"),
 *     @OA\Property(property="cityNameEn",type="string",description="Название города на английском",example="Moscow"),
 *     @OA\Property(property="airportNameRu",type="string",description="Название аэропорта на русском",example="Шереметьево"),
 *     @OA\Property(property="airportNameEn",type="string",description="Название аэропорта на английском",example="Sheremetyevo"),
 *     @OA\Property(property="area",type="string",description="Район аэропорта",example="Северный"),
 *     @OA\Property(property="country",type="string",description="Страна аэропорта",example="RU"),
 *     @OA\Property(property="latitude",type="string",description="Широта местоположения аэропорта",example="55.972642"),
 *     @OA\Property(property="longitude",type="string",description="Долгота местоположения аэропорта",example="37.414589"),
 *     @OA\Property(property="timezone",type="string",description="Часовой пояс аэропорта",example="Europe/Moscow")
 * )
 * @property Airport $resource
 */
final class AirportResource extends BaseJsonResource
{
    public function toArray($request): array
    {
        return [
            'id'            => $this->resource->id,
            'iataCode'      => $this->resource->iata_code,
            'cityNameRu'    => $this->resource->city_name_ru,
            'cityNameEn'    => $this->resource->city_name_en,
            'airportNameRu' => $this->resource->airport_name_ru,
            'airportNameEn' => $this->resource->airport_name_en,
            'area'          => $this->resource->area,
            'country'       => $this->resource->country,
            'latitude'      => $this->resource->latitude,
            'longitude'     => $this->resource->longitude,
            'timezone'      => $this->resource->timezone,
        ];
    }
}
