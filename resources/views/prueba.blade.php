<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>
    @vite(['resources/css/app.css', 'resources/js/main.js'])

    <!-- Scripts -->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.0.0/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <div class="relative w-1/2">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
        </div>
        <input type="text" id="search" class="block w-full p-4 ps-10 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Mockups, Logos..." required />
        <div id="suggestions" class="absolute z-10 hidden bg-white shadow-md rounded-lg max-h-60 overflow-y-auto w-full">
            <ul class="">
                <li class="py-2 px-4 hover:bg-gray-100">
                    <a href="#" class="block truncate">Sugerencia 1</a>
                </li>
                <li class="py-2 px-4 hover:bg-gray-100">
                    <a href="#" class="block truncate">Sugerencia 2</a>
                </li>
            </ul>
        </div>
    </div>
    
    <script>
    const searchInput = document.getElementById('search');
    const suggestions = document.getElementById('suggestions');
    
    searchInput.addEventListener('input', () => {
        suggestions.classList.toggle('hidden', searchInput.value === '');
    });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.0.0/dist/flowbite.min.js"></script>
</body>
</html>