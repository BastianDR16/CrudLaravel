<?php
namespace App\Http\Controllers;

use App\Models\Crud;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    public function index()
    {
        $registros = Crud::all();
        return view('crud.index', compact('registros'));
    }

    public function create()
    {
        return view('crud.create');
    }

    public function store(Request $request)
    {
// registro sera el objeto y el objeto que esta señalando con "->" es el nombre de la tabla

        $registro = new Crud();
        $registro->paciente = $request->input('paciente');
        $registro->doctor_asignado = $request->input('doctor_asignado');
        $registro->fecha = $request->input('fecha');
        $registro->hora = $request->input('hora');
        $registro->save();
        return redirect()->route('crud.index');
    }

    public function edit($id)
    {
        $registro = Crud::find($id);
        return view('crud.edit', compact('registro'));
    }

    public function update(Request $request, $id)
    {
        $registro = Crud::find($id);
        $registro->paciente = $request->input('paciente');
        $registro->doctor_asignado = $request->input('doctor');
        $registro->fecha = $request->input('fecha');
        $registro->hora = $request->input('hora');
        $registro->save();
        return redirect()->route('crud.index');
    }

    public function destroy($id)
    {
        $registro = Crud::find($id);
        $registro->delete();
        return redirect()->route('crud.index');
    }
}
