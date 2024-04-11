<?php

declare(strict_types=1);

namespace App\OpenApiParams;

/**
 * @OA\Parameter(
 *   parameter="__id",
 *   in="path",
 *   name="id",
 *   description="ID сущности",
 *   @OA\Schema(
 *     type="integer",
 *     default=1,
 *   )
 * ),
 * @OA\Parameter(
 *   parameter="__page",
 *   name="page",
 *   in="query",
 *   description="Номер страницы",
 *   required=false,
 *   @OA\Schema(
 *     type="integer",
 *   )
 * ),
 * @OA\Parameter(
 *   parameter="__limit",
 *   name="limit",
 *   in="query",
 *   description="Количество данных для показа",
 *   required=false,
 *   @OA\Schema(
 *     type="integer",
 *   )
 * ),
 */
final class OpenApiParams
{
    /**
     * @OA\Get(
     *     path="/test",
     *     @OA\Response(response="200", description="Test")
     * )
     */
}
