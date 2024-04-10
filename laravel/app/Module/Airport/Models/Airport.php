<?php

declare(strict_types=1);

namespace App\Module\Airport\Models;

use Database\Factories\AirportFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $iata_code
 * @property string|null $city_name_ru
 * @property string|null $city_name_en
 * @property string|null $airport_name_ru
 * @property string|null $airport_name_en
 * @property string|null $area
 * @property string|null $country
 * @property string|null $latitude
 * @property string|null $longitude
 * @property string $timezone
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 */
final class Airport extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $table = 'airports';

    protected static function newFactory(): AirportFactory
    {
        return AirportFactory::new();
    }
}
