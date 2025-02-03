@extends('layouts.MainLayout')

@section('content')
<div class="container mx-auto py-2">
    <h4 class="font-bold text-2xl py-3 mb-4">
        Account settings
    </h4>

    <div class="card overflow-hidden shadow-md">
        <div class="flex flex-row no-gutters border-b border-gray-200">
            <div class="w-1/4 pt-0">
                <div class="list-group flex flex-col">
                    <a class="list-group-item px-4 py-2 bg-gray-100 text-blue-700 font-medium" href="#" data-tab="general">General</a>
                    <a class="list-group-item px-4 py-2 hover:bg-gray-100" href="#" data-tab="security">Seguridad</a>
                    <a class="list-group-item px-4 py-2 hover:bg-gray-100" href="#" data-tab="details">Detalles</a>
                </div>
            </div>
            <div class="w-3/4">
                <div class="tab-content p-2">
                    <div id="general" class="tab-pane active">
                        @include('components.general-user-form')
                    </div>
                    <div id="security" class="tab-pane hidden">
                        @include('components.security-user-form')
                    </div>
                    <div id="details" class="tab-pane hidden">
                        @include('components.detail-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const tabs = document.querySelectorAll(".list-group-item");
        const panes = document.querySelectorAll(".tab-pane");

        tabs.forEach(tab => {
            tab.addEventListener("click", function (e) {
                e.preventDefault();
                
                // Remover clase activa de todos los tabs
                tabs.forEach(t => t.classList.remove("bg-gray-100", "text-blue-700"));
                
                // Agregar clase activa al tab seleccionado
                this.classList.add("bg-gray-100", "text-blue-700");

                // Ocultar todos los formularios
                panes.forEach(pane => pane.classList.add("hidden"));

                // Mostrar el formulario correspondiente
                document.getElementById(this.getAttribute("data-tab")).classList.remove("hidden");
            });
        });
    });
</script>

@endsection