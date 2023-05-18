@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Registro</h1>

        <form action="{{ route('crud.update', $registro->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="paciente">Nombre del Paciente:</label>
                <input type="text" name="paciente" class="form-control" value="{{ $registro->paciente }}" required>
            </div>

            <div class="form-group">
                <label for="doctor">Doctor:</label>
                <input type="text" name="doctor" class="form-control" value="{{ $registro->doctor_asignado}}" required>
            </div>

            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input type="date" name="fecha" class="form-control" value="{{ $registro->fecha }}" required>
            </div>

            <div class="form-group">
                <label for="hora">Hora:</label>
                <input type="time" name="hora" class="form-control" value="{{ $registro->hora }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('crud.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
