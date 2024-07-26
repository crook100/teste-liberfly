<?php

namespace App\Http\Controllers;

use App\Models\Dummy;
use Illuminate\Routing\Controller;

class DummyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * @OA\Get(
     *     path="/api/dummies",
     *     summary="Return all records from dummies table",
     *     security={{"jwt":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent(ref="#/components/schemas/ApiResponse")
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized",
     *         @OA\JsonContent(ref="#/components/schemas/ApiResponse")
     *     )
     * )
     */
    public function index()
    {
        $dummies = Dummy::all();
        return response()->json(
        [
            'status' => 'success',
            'data' => $dummies
        ]);
    }

    /**
     * @OA\Get(
     *     path="/api/dummies/{dummy_id}",
     *     summary="Return all records from dummies table",
     *     security={{"jwt":{}}},
     *     @OA\Parameter(
     *         description="ID as a integer",
     *         in="path",
     *         name="dummy_id",
     *         required=true
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent(ref="#/components/schemas/ApiResponse")
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized",
     *         @OA\JsonContent(ref="#/components/schemas/ApiResponse")
     *     )
     * )
     */
    public function show($id)
    {
        $dummy = Dummy::find($id);
        return response()->json([
            'status' => 'success',
            'data' => $dummy,
        ]);
    }
}
