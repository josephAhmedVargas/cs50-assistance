<?php

$titulos = [
    'ID',
    'Fecha',
    'Bloque',
    'Registrado Por',
    'Estado',
    'Creado en',
    'Acciones',
];

?>
<table id="export-table">
    <thead>
        <tr>
            @foreach ($titulos as $titulo)
                <th>
                    <span class="flex items-center">
                        {{ $titulo }}
                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                        </svg>
                    </span>
                </th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($attendances as $attendance)
        <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 cursor-pointer">
            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $attendance->id }}</td>
            <td>{{ $attendance->created_at->format('Y-m-d') }}</td>
            <td>{{ $attendance->schedule }}</td>
            <td>{{ $attendance->user_who_registered->name }}</td>
            <td>
                <span class="px-2 py-1 text-xs font-semibold rounded 
                    {{ $attendance->deleted_at ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' }}">
                    {{ $attendance->deleted_at ? 'Inactivo' : 'Activo' }}
                </span>
            </td>
            <td>{{ $attendance->created_at->format('Y-m-d H:i:s') }}</td>
            <td class="flex space-x-2">
                <!-- Botón Ver Detalles por Bloque -->
                {{-- <a href="{{ route('attendances.block', ['date' => $attendance->created_at->format('Y-m-d'), 'block' => $attendance->schedule]) }}"
                    class="px-2 py-1 text-xs font-semibold text-blue-600 bg-blue-100 rounded hover:bg-blue-200">
                    Ver detalles por bloque
                </a> --}}
                <button data-modal-target="static-modal" data-modal-toggle="static-modal" class="view-details px-2 py-1 text-xs font-semibold text-blue-600 bg-blue-100 rounded hover:bg-blue-200" 
                    data-date="{{ $attendance->created_at->format('Y-m-d') }}" 
                    data-block="{{ $attendance->schedule }}">
                    Ver detalles por bloque
                </button>
                <!-- Botón Ver Detalles -->
                {{-- <a href="{{ route('attendances.show', $attendance->id) }}"
                    class="attendance_details px-2 py-1 text-xs font-semibold text-gray-600 bg-gray-100 rounded hover:bg-gray-200" data-attendance-id="{{ $attendance->id }}">
                    Ver detalles
                </a> --}}

                <!-- Botón Eliminar (Solo si el usuario autenticado es el creador) -->
                @if (auth()->id() === $attendance->uploaded_by)
                <form action="{{ route('attendances.destroy', $attendance->id) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar esta asistencia?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="px-2 py-1 text-xs font-semibold text-red-600 bg-red-100 rounded hover:bg-red-200">
                        Eliminar
                    </button>
                </form>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


