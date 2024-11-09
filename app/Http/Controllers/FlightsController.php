<?php

namespace App\Http\Controllers;

use App\Models\Flights;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FlightsController extends Controller
{
    // Método para responder en JSON de forma consistente
    private function jsonResponse($message, $status, $data = [])
    {
        return response()->json(array_merge([
            'message' => $message,
            'status' => $status
        ], $data), $status);
    }

    // Método para validación
    private function validateFlightData(Request $request)
    {
        $rules = [
            'flight_number' => 'required',
            'departure_airport' => 'required',
            'arrival_airport' => 'required',
            'departure_date' => 'required',
            'departure_time' => 'required'
        ];
        return Validator::make($request->all(), $rules);
    }

    // Listar todos los vuelos
    public function index()
    {
        $flights = Flights::all();
        return $this->jsonResponse('Flights retrieved successfully', 200, ['flights' => $flights]);
    }

    // Guardar un nuevo vuelo
    public function store(Request $request)
    {
        $validator = $this->validateFlightData($request);

        if ($validator->fails()) {
            return $this->jsonResponse('Validation error', 400, ['errors' => $validator->errors()]);
        }

        $flight = Flights::create($request->only(['flight_number', 'departure_airport', 'arrival_airport', 'departure_date', 'departure_time']));

        return $this->jsonResponse('Flight created successfully', 201, ['flight' => $flight]);
    }

    // Mostrar un vuelo específico
    public function show($id)
    {
        $flight = Flights::find($id);

        if (!$flight) {
            return $this->jsonResponse('Flight not found', 404);
        }

        return $this->jsonResponse('Flight retrieved successfully', 200, ['flight' => $flight]);
    }

    // Actualizar un vuelo
    public function update(Request $request, $id)
    {
        $flight = Flights::find($id);

        if (!$flight) {
            return $this->jsonResponse('Flight not found', 404);
        }

        $validator = $this->validateFlightData($request);

        if ($validator->fails()) {
            return $this->jsonResponse('Validation error', 400, ['errors' => $validator->errors()]);
        }

        $flight->update($request->only(['flight_number', 'departure_airport', 'arrival_airport', 'departure_date', 'departure_time', 'arrival_time']));

        return $this->jsonResponse('Flight updated successfully', 200, ['flight' => $flight]);
    }

    // Eliminar un vuelo
    public function destroy($id)
    {
        $flight = Flights::find($id);

        if (!$flight) {
            return $this->jsonResponse('Flight not found', 404);
        }

        $flight->delete();

        return $this->jsonResponse('Flight deleted successfully', 200);
    }

    // Actualización parcial de un vuelo
    public function updatePartial(Request $request, $id)
    {
        $flight = Flights::find($id);

        if (!$flight) {
            return $this->jsonResponse('Flight not found', 404);
        }

        $validator = $this->validateFlightData($request);

        if ($validator->fails()) {
            return $this->jsonResponse('Validation error', 400, ['errors' => $validator->errors()]);
        }

        // Solo actualizar los campos presentes en el request
        $flight->update($request->only([
            'flight_number',
            'departure_airport',
            'arrival_airport',
            'departure_date',
            'departure_time',
            'arrival_time'
        ]));

        return $this->jsonResponse('Flight updated partially successfully', 200, ['flight' => $flight]);
    }
}
