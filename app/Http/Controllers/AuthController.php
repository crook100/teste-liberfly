<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;

class AuthController extends Controller
{

    public function __construct()
    {
        //Exige autenticação em todos os endpoints, exceto login
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    /**
     * @OA\Post(
     *     path="/api/login",
     *     summary="Application login",
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/x-www-form-urlencoded",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="email",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="password",
     *                     type="string"
     *                 )
     *             )
     *         )
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
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        $credentials = $request->only('email', 'password');

        $token = Auth::attempt($credentials);
        if (!$token)
        {
            return response()->json(
            [
                'status' => 'error',
                'data' => [
                    'message' => 'Verifique seus dados e tente novamente mais tarde.'
                ]
            ], 401);
        }

        $user = Auth::user();
        return response()->json(
            [
                'status' => 'success',
                'data' => [
                    'user' => $user,
                    'auth' => [
                        'token' => $token,
                        'type' => 'bearer'
                    ]
                ]
            ]);
    }

    /**
     * @OA\Post(
     *     path="/api/logout",
     *     summary="Application logout",
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
    public function logout()
    {
        Auth::logout();
        return response()->json(
        [
            'status' => 'success',
            'data' => [
                'message' => 'Logout realizado com sucesso.'
            ]
        ]);
    }

    /**
     * @OA\Post(
     *     path="/api/refresh",
     *     summary="Application token refresh",
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
    public function refresh()
    {
        return response()->json(
        [
            'status' => 'success',
            'data' => [
                'user' => Auth::user(),
                'auth' => [
                    'token' => Auth::refresh(),
                    'type' => 'bearer',
                ]
            ]
        ]);
    }
}
