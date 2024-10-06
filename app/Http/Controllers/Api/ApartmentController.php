<?php

namespace App\Http\Controllers\Api;

use App\Models\Apartment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Availability;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
class ApartmentController extends Controller
{
    /**
        * @OA\Get(
        *     path="/api/apartments",
        *     summary="Listar todos los apartamentos",
        *     description="Obtiene una lista de todos los apartamentos disponibles. Puedes usar parámetros de paginación opcionales como `page` y `perPage` para paginar los resultados.",
        *     tags={"Apartments"},
        *     @OA\Parameter(
        *         name="filter[level]",
        *         in="query",
        *         required=false,
        *         description="Filtrar por nivel del apartamento",
        *         @OA\Schema(type="integer", example=3)
        *     ),
        *     @OA\Parameter(
        *         name="filter[apartment_id]",
        *         in="query",
        *         required=false,
        *         description="Filtrar por ID del apartamento",
        *         @OA\Schema(type="string", example="")
        *     ),
        *     @OA\Parameter(
        *         name="filter[price]",
        *         in="query",
        *         required=false,
        *         description="Filtrar por precio del apartamento",
        *         @OA\Schema(type="string", format="decimal")
        *     ),
        *     @OA\Parameter(
        *         name="filter[total_amount]",
        *         in="query",
        *         required=false,
        *         description="Filtrar por monto total",
        *         @OA\Schema(type="string", format="decimal")
        *     ),
        *     @OA\Parameter(
        *         name="filter[availability_id]",
        *         in="query",
        *         required=false,
        *         description="Filtrar por ID de disponibilidad",
        *         @OA\Schema(type="integer", example=1)
        *     ),
        *     @OA\Parameter(
        *         name="page",
        *         in="query",
        *         required=false,
        *         description="Número de página para la paginación",
        *         @OA\Schema(type="integer", example=1)
        *     ),
        *     @OA\Parameter(
        *         name="per_page",
        *         in="query",
        *         required=false,
        *         description="Número de resultados por página",
        *         @OA\Schema(type="integer", example=100)
        *     ),
        *     @OA\Parameter(
        *         name="sort",
        *         in="query",
        *         required=false,
        *         description="Ordenar resultados por determinada columna. La ordenación es ascendente de forma predeterminada y se puede revertir agregando un guion (-)",
        *         @OA\Schema(type="string", example="-price")
        *     ),
        *     @OA\Response(
        *         response=200,
        *         description="Lista de apartamentos",
        *         @OA\JsonContent(
        *             type="object",
        *             @OA\Property(property="data", type="array", @OA\Items(ref="#/components/schemas/Apartment") ),
        *             @OA\Property(property="current_page", type="integer", example=1 ),
        *             @OA\Property(property="from", type="integer", example=1),
        *             @OA\Property(property="per_page", type="integer", example=100 ),
        *              @OA\Property(property="to", type="integer", example=10)
        *         )
        *     ),
        *     @OA\Response(
        *         response=400,
        *         description="Solicitud incorrecta",
        *         @OA\JsonContent(
        *             @OA\Property(property="message", type="string", example="Parámetro de paginación inválido.")
        *         )
        *     )
        * )
        */
    public function index(Request $request)
    {
        $apartments = QueryBuilder::for(Apartment::class)
        ->allowedFilters([
            'level', 
            'apartment_id',
            AllowedFilter::exact('price'),
            AllowedFilter::exact('total_amount'),
            'availability_id'
        ])
        ->allowedSorts([
            'level','apartment_id','price','total_amount','availability_id'
        ])
        ->with('availability')
        ->paginate($request->input('per_page', 100)); // Paginación

        return response()->json($apartments);
    }


    public function create()
    {
        //
    }

    /**
     * @OA\Post(
     *     path="/api/apartments",
     *     summary="Crear un nuevo apartamento",
     *     description="Crea un nuevo apartamento con los detalles proporcionados.",
     *     tags={"Apartments"},
     *     security={{"sanctum": {}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"level", "apartment_id", "price", "total_amount", "availability_id"},
     *             @OA\Property(property="level", type="integer", example=3, description="El nivel del apartamento"),
     *             @OA\Property(property="apartment_id", type="string", example="Test-101", description="ID del apartamento"),
     *             @OA\Property(property="price", type="string", format="decimal", example="350.00", description="Precio del apartamento"),
     *             @OA\Property(property="total_amount", type="string", format="decimal", example="420.00", description="Monto total"),
     *             @OA\Property(property="availability_id", type="integer", example=1, description="ID de disponibilidad"),
     *             @OA\Property(property="comments", type="string", description="Comentarios adicionales", example="Apartamento renovado")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Apartamento creado exitosamente",
     *         @OA\JsonContent(
     *           @OA\Property(property="message", type="string", example="Apartamento creado exitosamente"),
     *           @OA\Property(property="apartment", type="object", ref="#/components/schemas/Apartment"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Datos inválidos"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'level' => 'required|integer',
            'apartment_id' => 'required|string|max:10',
            'price' => 'required|numeric',
            'total_amount' => 'required|numeric',
            'availability_id' => 'required|integer',
            'comments' => 'nullable|string',
        ]);
    
        $apartment = Apartment::create($validated);
    
        return response()->json([
            "message"=>"Apartamento creado exitosamente", 
            "apartment"=>$apartment
        ],201);
    }

    /**
     * @OA\Get(
     *     path="/api/apartments/{apartment_id}",
     *     tags={"Apartments"},
     *     summary="Obtener los detalles de un apartamento",
     *     description="Devuelve la información detallada de un apartamento específico basado en su ID.",
     *     operationId="getApartamentById",
     *     @OA\Parameter(
     *         name="apartment_id",
     *         in="path",
     *         description="apartment_id del apartamento",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Operación exitosa",
     *         @OA\JsonContent(ref="#/components/schemas/Apartment")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Apartamento no encontrado"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Error del servidor"
     *     )
     * )
     */
    public function show(Apartment $apartment_id)
    {
        $response =  $apartment_id->load("availability");
        return response()->json($response, 200);
    }


    /**
     * @OA\Put(
     *     path="/api/apartments/{apartment_id}",
     *     summary="Actualizar un apartamento existente",
     *     description="Actualiza los detalles de un apartamento existente basado en el apartment_id proporcionado.",
     *     tags={"Apartments"},
     *     security={{"sanctum": {}}},
     *     @OA\Parameter(
     *         name="apartment_id",
     *         in="path",
     *         required=true,
     *         description="apartment_id del apartamento que se va a actualizar",
     *         @OA\Schema(type="string", example="Test-101")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"level", "price", "total_amount", "availability_id"},
     *             @OA\Property(property="level", type="integer", example=3, description="El nivel del apartamento"),
     *             @OA\Property(property="price", type="string", format="decimal", example="350.00", description="Precio del apartamento"),
     *             @OA\Property(property="total_amount", type="string", format="decimal", example="420.00", description="Monto total"),
     *             @OA\Property(property="availability_id", type="integer", example=1, description="ID de disponibilidad"),
     *             @OA\Property(property="comments", type="string", description="Comentarios adicionales", example="Apartamento renovado")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Apartamento actualizado exitosamente",
     *         @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Apartamento actualizado exitosamente"),
     *              @OA\Property(property="apartment", type="object", ref="#/components/schemas/Apartment"),
     *          )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Apartamento no encontrado"
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Datos inválidos"
     *     )
     * )
     */
    public function update(Request $request, $apartment_id)
    {
        $apartment = Apartment::where('apartment_id', $apartment_id)->firstOrFail();

        $validated = $request->validate([
            'level' => 'required|integer',
            'price' => 'required|numeric',
            'total_amount' => 'required|numeric',
            'availability_id' => 'required|integer',
            'comments' => 'nullable|string',
        ]);
    
        $apartment->update($validated);
    
        return response()->json([
            "message"=>"Apartamento actualizado exitosamente", 
            "apartment"=>$apartment
        ],201);
    }

    /**
     * @OA\Delete(
     *     path="/api/apartments/{apartment_id}",
     *     summary="Eliminar un apartamento",
     *     description="Elimina un apartamento basado en su apartment_id.",
     *     tags={"Apartments"},
     *     security={{"sanctum": {}}},
     *     @OA\Parameter(
     *         name="apartment_id",
     *         in="path",
     *         required=true,
     *         description="apartment_id del apartamento a eliminar",
     *         @OA\Schema(type="string", example="Test-101")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Apartamento eliminado exitosamente",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Apartamento eliminado exitosamente.")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Apartamento no encontrado"
     *     )
     * )
     */
    public function destroy($apartment_id)
    {
        $apartment = Apartment::where('apartment_id', $apartment_id)->firstOrFail();

        $apartment->delete();

        return response()->json(['message' => 'Apartamento eliminado exitosamente.'], 200);
    }

    /**
     * @OA\Get(
     *     path="/api/availabilities",
     *     tags={"Availability"},
     *     summary="Obtener la lista de Disponibilidad",
     *     @OA\Response(
     *         response=200,
     *         description="Operación exitosa",
     *         @OA\JsonContent(
     *              type="object",
     *              @OA\Property( 
     *                  property="data", type="array", @OA\Items(ref="#/components/schemas/Availability")
     *             ),
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Error del servidor"
     *     )
     * )
     */
    public function availabilities(){
        $response =  Availability::all();
        return response()->json($response, 200);
    }
}
