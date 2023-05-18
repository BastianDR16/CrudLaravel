<?php

namespace App\Http\Controllers;

use App\Models\Crud;
use Illuminate\Http\Request;

class ApiCrudController extends Controller
{
    public function index()
    {
        $registros = Crud::all();
        return response()->json($registros);
    }


    public function store(Request $request)
    {
        $registro = new Crud();
        $registro->paciente = $request->input('paciente');
        $registro->doctor_asignado = $request->input('doctor_asignado');
        $registro->fecha = $request->input('fecha');
        $registro->hora = $request->input('hora');
        $registro->save();
        return response()->json($registro);
    }

    public function show($id)
    {
        $registro = Crud::find($id);
        return response()->json($registro);
    }

  public function update(Request $request, $id)
{
    $registro = Crud::find($id);
    $registro->paciente = $request->input('paciente');
    $registro->doctor_asignado = $request->input('doctor_asignado');
    $registro->fecha = $request->input('fecha');
    $registro->hora = $request->input('hora');
    $registro->save();
    return response()->json($registro);
}

    public function destroy($id)
    {
        $registro = Crud::find($id);
        $registro->delete();
        return response()->json(['message' => 'Registro eliminado']);
    }
}
