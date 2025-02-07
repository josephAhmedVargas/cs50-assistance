@extends('layouts.MainLayout') <!-- Asegúrate de que tienes un layout base -->

@section('content')

{{-- <table id="sorting-table">
    <thead>
        <tr>
            
        </tr>
    </thead>
    <tbody>
             
    </tbody>
</table>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        if (document.getElementById("sorting-table") && typeof simpleDatatables.DataTable !== 'undefined') {
            const dataTable = new simpleDatatables.DataTable("#sorting-table", {
                searchable: false,
                perPageSelect: false,
                sortable: true,
                data: {
                    headings: ["Country", "GDP", "Population", "GDP per Capita", "Actions"],
                    data: [
                        ["Country 1", "GDP 1", "Population 1", "GDP per Capita 1", '<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button> <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>'],

                    ],
                }
            });
            // let newRows = [
            //     ["Cell 1", "Cell 2", "Cell 3", "Cell 4"],
            //     ["Cell 2", "Cell 2", "Cell 3", "Cell 4"],
            //     ["Cell 3", "Cell 2", "Cell 3", "Cell 4"],
            //     ["Cell 4", "Cell 2", "Cell 3", "Cell 4"],
            // ];
            // dataTable.insert({data : newRows});
            
        }
    });
</script> --}}

    @include('components.modal-assistance-block')

@endsection