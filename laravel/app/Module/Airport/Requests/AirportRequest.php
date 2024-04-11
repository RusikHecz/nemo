<?php

declare(strict_types=1);

namespace App\Module\Airport\Requests;

use App\Module\Airport\DTO\AirportDTO;
use Illuminate\Foundation\Http\FormRequest;

final class AirportRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'limit'         => ['nullable', 'integer'],
            'page'          => ['nullable', 'integer'],
            'airportNameRu' => ['nullable', 'string'],
        ];
    }

    /**
     * @return AirportDTO
     */
    public function getDTO(): AirportDTO
    {
        return AirportDTO::fromRequest($this);
    }
}
