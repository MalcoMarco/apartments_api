<?php

namespace App\Swagger;

/**
 * @OA\Schema(
 *     schema="User",
 *     type="object",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="name", type="string", example="John Doe"),
 *     @OA\Property(property="email", type="string", example="user@example.com"),
 * )
 * @OA\SecurityScheme(
 *     securityScheme="sanctum",
 *     type="http",
 *     scheme="bearer",
 *     bearerFormat="JWT",
 *     description="Utiliza un token JWT para la autenticación"
 * )
 */


class SwaggerSchemas
{
    // Este archivo puede permanecer vacío
    // Las anotaciones son suficientes para que Swagger las reconozca.
}