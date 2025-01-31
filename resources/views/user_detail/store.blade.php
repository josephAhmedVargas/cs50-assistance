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
                    <a class="list-group-item px-4 py-2 active bg-gray-100 text-blue-700 font-medium" href="#account-general">General</a>
                    <a class="list-group-item px-4 py-2 hover:bg-gray-100" href="#account-change-password">Seguridad</a>
                    <a class="list-group-item px-4 py-2 hover:bg-gray-100" href="#account-info">Detalles</a>
                </div>
            </div>
            <div class="w-3/4">
                <div class="tab-content p-2">
                    <div class="tab-pane active" id="account-general">
                        {{-- @include('components.detail-user-form') --}}
                        {{-- @include('components.security-user-form') --}}
                        @include('components.general-user-form')
                   </div>
            </div>
        </div>
    </div>

    {{-- <div class="text-right mt-3 mb-3 mx-3">
        <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save changes</button>&nbsp;
        <button type="button" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">Cancel</button>
    </div> --}}

</div>
 
@endsection