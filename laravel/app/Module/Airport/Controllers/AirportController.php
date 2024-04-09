<?php

declare(strict_types=1);

namespace App\Module\Airport\Controllers;

use App\Http\Controllers\Controller;
use App\Module\Airport\Permissions\PermissionList;
use Illuminate\Auth\Access\AuthorizationException;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

final class AirportController extends Controller
{
    /**
     * @OA\Get(
     *     path="/airports",
     *     summary="Полный список аэропортов",
     *     operationId="getListOfAirports",
     *     tags={"Airport"},
     *
     *     @OA\Parameter (ref="#/components/parameters/__x_user"),
     *     @OA\Parameter (ref="#/components/parameters/__limit"),
     *     @OA\Parameter (ref="#/components/parameters/__page"),
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
     *         description="Список рейсов",
     *         @OA\JsonContent(
     *             @OA\Property(property="data",
     *                 type="object",
     *              ),
     *         )
     *     ),
     *     security={
     *         {"bearer": {}}
     *     }
     * )
     * @throws AuthorizationException
     */
    public function index(): void
    {
//        $this->authorize(PermissionList::AIRPORT_INDEX);
        dd('index');
    }
}
