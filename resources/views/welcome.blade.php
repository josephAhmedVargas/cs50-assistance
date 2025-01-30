@extends('layouts.MainLayout')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 bg-slate-100 dark:text-gray-100">
                {{ __("¡Has iniciado sesión!") }}
            </div>
        </div>
    </div>
</div>
@endsection
