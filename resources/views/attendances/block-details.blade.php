@extends('layouts.MainLayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Detalles de Asistencia - Bloque: {{ $block }} - Fecha: {{ $date }}
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Usuario</th> 
                                <th>Ciclo</th>
                                <th>Horario</th>
                                <th>Registrado Por</th>
                                <th>Tipo</th>
                                <th>Número de Clase</th>
                                <th>Hora de Oficina Semanal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($attendances as $attendance)
                                <tr>
                                    <td>{{ $attendance->id }}</td>
                                    <td>{{ $attendance->user_who_registered->name }}</td>
                                    <td>{{ $attendance->cycle_id }}</td> 
                                    <td>{{ $attendance->schedule }}</td>
                                    <td>{{ $attendance->registered_by }}</td>
                                    <td>{{ $attendance->type }}</td>
                                    <td>{{ $attendance->class_number }}</td>
                                    <td>{{ $attendance->office_hour_week }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection