<?php

namespace App\Models;

/**
 * @OA\Schema(
 *     title="API Response",
 *     description="API Response",
 *     @OA\Xml(
 *         name="ApiResponse"
 *     )
 * )
 */
class ApiResponse
{
    /**
     * @OA\Property(
     *     title="Status",
     *     description="Status",
     *     format="string",
     * )
     *
     * @var string
     */
    public string $status;

    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data",
     *     format="array",
     *     @OA\Items()
     * )
     *
     * @var array
     */
    public array $data;
}
