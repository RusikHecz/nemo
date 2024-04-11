<?php

declare(strict_types=1);

namespace App\Module\Airport\Controllers;

use App\Http\Controllers\Controller;
use App\Module\Airport\Contracts\Services\AirportService;
use App\Module\Airport\Requests\AirportRequest;
use App\Module\Airport\Resources\AirportsResource;
use Illuminate\Auth\Access\AuthorizationException;

final class AirportController extends Controller
{
    public function __construct(
        private readonly AirportService $service
    ) {
    }

    /**
     * @OA\Get(
     *     path="/airports",
     *     summary="Полный список аэропортов",
     *     operationId="getListOfAirports",
     *     tags={"Airport"},
     *
     *     @OA\Parameter(ref="#/components/parameters/__limit"),
     *     @OA\Parameter(ref="#/components/parameters/__page"),
     *
     *     @OA\Parameter(
     *         name="airportName",
     *         in="query",
     *         description="название аэропорта",
     *         required=false,
     *         @OA\Schema(
     *             type="string",
     *         )
     *     ),
     *
     *     @OA\Response(
     *         response=200,
     *         description="Полный список аэропортов",
     *         @OA\JsonContent(
     *             @OA\Property(property="data",type="object",ref="#/components/schemas/AirportResource"),
     *         )
     *     ),
     *     security={
     *         {"bearer": {}}
     *     }
     * )
     */
    public function index(AirportRequest $request): AirportsResource
    {
        return new AirportsResource(
            $this->service->getAll($request->getDTO())
        );
    }
}
