<?php

declare(strict_types=1);

namespace App\Module\Airport\Resources;

use App\Http\Resources\BaseResourceCollection;
use Illuminate\Http\Request;

final class AirportsResource extends BaseResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
          'data' => AirportResource::collection($this)
        ];
    }
}
