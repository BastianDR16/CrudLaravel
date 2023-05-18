@extends('layouts.app')

@section('content')

<main class="container">
    
<h1> Añadir cita</h1>
    <form action="{{ route('crud.store') }}" method="POST" class="grid_insert">
    @csrf

    <div class="grid_block">
        <label for="paciente">Nombre de paciente:</label>
        <input type="text" name="paciente" class="form-control" placeholder="Ingrese el nombre del paciente" value="{{ old('paciente') }}" required>
    </div>

    <div class="grid_block">
        <label for="doctor">Nombre del doctor:</label>
        <input type="text" name="doctor_asignado" class="form-control" placeholder="Ingrese el nombre del doctor" value="{{ old('doctor_asignado') }}"required>
    </div>
    <div class="grid_block">
        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" class="form-control" value="{{ old('fecha') }}" required>
    </div>

    <div class="grid_block">
        <label for="hora">Hora:</label>
        <input type="time" name="hora" class="form-control" value="{{ old('hora') }}" required>
    </div>

    <input type="submit" value="insertar"/>
       

    </form>


    <h1>Lista de registros</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Doctor</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($registros as $registro)
                <tr>
                    <td>{{ $registro->id }}</td>
                    <td>{{ $registro->paciente }}</td>
                    <td>{{ $registro->doctor_asignado }}</td>
                    <td>{{ $registro->fecha }}</td>
                    <td>{{ $registro->hora }}</td>
                    <td><form action="{{ route('crud.edit', $registro->id) }}" method="GET">
                    @csrf
                    <button type="submit" class="button_edit">Editar</button>
</form>
                    </td>
                    <td>
                        <form action="{{ route('crud.destroy', $registro->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="button_delete"type="submit">Eliminar</button>
                        </form>  
                    </td>
                </tr>
            @endforeach
        </tbody >
    </table>


</main>

    @endsection
