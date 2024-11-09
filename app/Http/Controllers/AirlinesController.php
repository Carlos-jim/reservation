<?php

namespace App\Http\Controllers;

use App\Models\AirlinesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AirlinesController extends Controller
{
    // Método para responder en JSON de forma consistente
    private function jsonResponse($message, $status, $data = [])
    {
        return response()->json(array_merge([
            'message' => $message,
            'status' => $status
        ], $data), $status);
    }

    private function validateAirlinesData(Request $request)
    {
        $rules = [
            'name' => 'required',
            'code' => 'required',
        ];
        return Validator::make($request->all(), $rules);
    }

    public function index(){
        $airlines = AirlinesModel::all();
        return $this->jsonResponse('airlines retrieved successfully', 200, ['airlines' => $airlines]);

    }

    public function store(Request $request){
        $validator = $this->validateAirlinesData($request);

        if ($validator->fails()){
            return $this->jsonResponse('Not valid', 400, ['errors' => $validator->errors()]);
        };

        $airlines = AirlinesModel::create($request->all());

        return $this->jsonResponse('Success',200, ['airlines'=>$airlines]);
    }

}
