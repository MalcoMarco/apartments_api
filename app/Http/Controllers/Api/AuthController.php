<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/login",
     *     operationId="loginUser",
     *     tags={"Auth"},
     *     summary="Iniciar sesión",
     *     description="Permite al usuario iniciar sesión y recibir un token de acceso.",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"email","password"},
     *             @OA\Property(property="email", type="string", format="email", example="user@example.com"),
     *             @OA\Property(property="password", type="string", example="password123"),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Inicio de sesión exitoso",
     *         @OA\JsonContent(
     *             @OA\Property(property="token", type="string", example="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9..."),
     *             @OA\Property(property="user", type="object", ref="#/components/schemas/User"),
     *         ),
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Credenciales incorrectas",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Credenciales incorrectas"),
     *         ),
     *     )
     * )
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Verificar si el usuario existe
        $user = User::where('email', $request->email)->first();

        // Verificar la contraseña
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Credenciales inválidas'
            ], 401);
        }

        // Generar token con Sanctum
        $token = $user->createToken('auth_token')->plainTextToken;

        // Retornar el token y la información del usuario
        return response()->json([
            'token' => $token,
            'user' => $user,
        ], 200);
    }


    /**
     * @OA\Get(
     *     path="/api/user",
     *     operationId="getAuthenticatedUser",
     *     tags={"Auth"},
     *     summary="Obtener el usuario autenticado",
     *     description="Retorna los detalles del usuario que ha iniciado sesión.",
     *     security={{"sanctum": {}}},
     *     @OA\Response(
     *         response=200,
     *         description="Usuario obtenido exitosamente",
     *         @OA\JsonContent(ref="#/components/schemas/User"),
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="No autorizado",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="No autorizado"),
     *         ),
     *     )
     * )
     */
    public function getAuthenticatedUser(Request $request)
    {
        // Obtener el usuario autenticado con Sanctum
        $user = $request->user();

        // Retornar los detalles del usuario en formato JSON
        return response()->json([
            'user' => $user,
        ], 200);
    }

    /**
     * @OA\Post(
     *     path="/api/logout",
     *     summary="Cerrar sesión (Logout)",
     *     description="Revoca el token actual del usuario autenticado.",
     *     tags={"Auth"},
     *     security={{"sanctum": {}}},
     *     @OA\Response(
     *         response=200,
     *         description="Sesión cerrada correctamente",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Sesión cerrada correctamente")
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="No autorizado. El token no es válido o ha expirado."
     *     )
     * )
     */
    public function logout(Request $request)
    {
        // "5|9PQ5PhLbyq817OBvJ8v0TenRgntM8R1iItzkTRLT537cdfad"
        // Get bearer token from the request
        $accessToken = $request->bearerToken();
                
        // Get access token from database
        $token = PersonalAccessToken::findToken($accessToken);
        $token->delete();
        return response()->json(['message' => 'Sesión cerrada correctamente'], 200);
        return response()->json(['token' => $token,'accessToken'=>$accessToken], 200);

        /*$user->tokens()->where('id', $user->currentAccessToken()->id)->delete();
        $request->user()->currentAccessToken()->delete();
        
        return response()->json(['message' => 'Sesión cerrada correctamente'], 200);*/
    }

    public function test() {
        return "user";
    }
}
