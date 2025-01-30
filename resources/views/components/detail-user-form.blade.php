<section class="bg-white dark:bg-gray-900 mb-4">
    <div class="px-4 mx-auto">
        <form action="{{ route('user-details.store')}}">
            @csrf
            @method('put')
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">

                <div class="sm:col-span-2">
                    <label for="Biografia" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Biografia</label>
                    <textarea id="biografia" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"></textarea>
                </div>
                <div class="sm:col-span-2">
                    <label for="github" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Usuario GitHub</label>
                    <input type="github" name="github" id="github" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                </div>
                <div class="w-full">
                    <label for="cargo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cargo</label>
                    <input type="text" name="cargo" id="cargo" class="mb-5 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" required="" disabled>
                </div>
        
                <div class="">
                    <label for="item-weight" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo Staff</label>
                    <input type="number" name="item-weight" id="item-weight" class="mb-5 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" required="" disabled readonly>
                </div> 
                
            </div>
            <button type="submit" class="inline-flex mb-2 items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-500 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                Guardar cambios
            </button>

        </form>
    </div>
  </section>
