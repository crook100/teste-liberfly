<?php

namespace App\Http\Controllers;

/**
 *
 * @OA\OpenApi(
 *   security={
 *     {"jwt":{}}
 *   }
 * )
 *
 * @OA\Info(
 *      version="1.0.0",
 *      title="LiberFly test",
 *      description="LiberFly test",
 *      @OA\Contact(
 *          email="thiagobarrado99@gmail.com"
 *      ),
 *      @OA\License(
 *          name="Apache 2.0",
 *          url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *      )
 * )
 *
 * @OAS\SecurityScheme(
 *      securityScheme="jwt",
 *      type="http",
 *      name="Authorization",
 *      scheme="bearer"
 *      bearerFormat="JWT"
 * )
 *
 * @OA\Server(
 *      url=L5_SWAGGER_CONST_HOST,
 *      description="Demo API Server"
 * )

*/
class Controller
{
}
