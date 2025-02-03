@extends('layouts.MainLayout')

@section('content')
@include('components.attendance-user-table')

<script>
    // if (document.getElementById("default-table") && typeof simpleDatatables.DataTable !== 'undefined') {

    //     const customData = {
    //         headings: ['ID', 'Nombre de Estudiante', 'Código de Estudiante', 'Grupo de Clases', 'Asistencia', 'Nota', 'Acciones'],
    //         data: [
    //             ['1', 'Jose Pérez', 'Y23C1-jperez', 'A', 'presente', '', 'Editar | Eliminar'],
    //             ['2', 'María Gómez', 'Y23C2-mgomez', 'B', 'presente', '', 'Editar | Eliminar'],
    //         ]
    //     }
    //     const dataTable = new simpleDatatables.DataTable("#default-table", {
    //         data: customData,
    //         searchable: false,
    //         perPageSelect: false
    //     });
    // }
</script>

@endsection