{{-- <section class="bg-white dark:bg-gray-900 mb-4">
    <div class="px-4 mx-auto">
      <form action="{{ route('user-details.store') }}" method="put">
        @csrf
  
        <div class="sm:col-span-2 lg:w-xl space-y-4 md:w-md">
  
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Primer nombre</label>
                    <input type="text" name="first_name" id="first_name" value="{{ old('first_name', auth()->user()->info->first_name) }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" required disabled>
                </div>
                <div>
                    <label for="middle_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Segundo nombre</label>
                    <input type="text" name="middle_name" id="middle_name" value="{{ old('middle_name', auth()->user()->info->middle_name) }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" required disabled>
                </div>
                <div>
                    <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Primer Apellido</label>
                    <input type="text" name="last_name" id="last_name" value="{{ old('last_name', auth()->user()->info->last_name) }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" required disabled>
                </div>
                <div>
                    <label for="second_last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Segundo Apellido</label>
                    <input type="text" name="second_last_name" id="second_last_name" value="{{ old('second_last_name', auth()->user()->info->second_last_name) }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:border-base-300" required disabled>
                </div>
                <div>
                    <label for="identification_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cédula de identidad</label>
                    <input type="text" name="identification_number" id="identification_number" value="{{ old('identification_number', auth()->user()->info->identification_number) }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:border-base-300" required disabled>
                </div>
                <div>
                    <label for="birth_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha de nacimiento</label>
                    <input type="date" name="birth_date" id="birth_date" value="{{ old('birth_date', auth()->user()->info->birth_date) }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:border-base-300" required disabled>
                </div>

                <div>
                    <label for="residence" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Residencia</label>
                    <input type="text" name="residence" id="residence" value="{{ old('residence', auth()->user()->info->residence) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                  </div>
                  <div>
                    <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Teléfono</label>
                    <input type="tel" name="phone" id="phone" value="{{ old('phone', auth()->user()->info->phone) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                  </div>
                  <div>
                    <label for="education_level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nivel de educación</label>
                    <input type="text" name="education_level" id="education_level" value="{{ old('education_level', auth()->user()->info->education_level) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                  </div>
                  <div>
                    <label for="institution_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre de la institución</label>
                    <input type="text" name="institution_name" id="institution_name" value="{{ old('institution_name', auth()->user()->info->institution_name) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                  </div>

                  <div>
                    <label for="institution_address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dirección de la institución</label>
                    <input type="text" name="institution_address" id="institution_address" value="{{ old('institution_address', auth()->user()->info->institution_address) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                  </div>
          
                  <div>
                    <label for="career" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Carrera</label>
                    <input type="text" name="career" id="career" value="{{ old('career', auth()->user()->info->career) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                  </div>
          
                  <div>
                    <label for="tshirt_size" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Talla de camiseta</label>
                    <select id="tshirt_size" name="tshirt_size" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                      <option value="">Seleccionar</option>
                      <option value="S" {{ old('tshirt_size', auth()->user()->info->tshirt_size) == 'S' ? 'selected' : '' }}>S</option>
                      <option value="M" {{ old('tshirt_size', auth()->user()->info->tshirt_size) == 'M' ? 'selected' : '' }}>M</option>
                      <option value="L" {{ old('tshirt_size', auth()->user()->info->tshirt_size) == 'L' ? 'selected' : '' }}>L</option>
                      <option value="XL" {{ old('tshirt_size', auth()->user()->info->tshirt_size) == 'XL' ? 'selected' : '' }}>XL</option>
                    </select>
                  </div>

            </div>
  
        </div>
        <button type="submit" class="inline-flex mb-2 items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-500 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
          Guardar cambios
        </button>
      </form>
    </div>
  </section> --}}
  <section class="bg-white dark:bg-gray-900 mb-4">
    <div class="px-4 mx-auto">
      <form action="{{ route('user-details.store') }}" method="post">
        @csrf
        @method('PUT')
  
        <div class="sm:col-span-2 lg:w-xl space-y-4 md:w-md">
  
            <div class="grid grid-cols-2 gap-4">
                @php
                    $info = auth()->user()->info ?? null;
                @endphp
                
                <div>
                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Primer nombre</label>
                    <input type="text" name="first_name" id="first_name" value="{{ old('first_name', $info->first_name ?? '') }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" required disabled>
                </div>
                
                <div>
                    <label for="middle_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Segundo nombre</label>
                    <input type="text" name="middle_name" id="middle_name" value="{{ old('middle_name', $info->middle_name ?? '') }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" required disabled>
                </div>
                
                <div>
                    <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Primer Apellido</label>
                    <input type="text" name="last_name" id="last_name" value="{{ old('last_name', $info->last_name ?? '') }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" required disabled>
                </div>
                
                <div>
                    <label for="second_last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Segundo Apellido</label>
                    <input type="text" name="second_last_name" id="second_last_name" value="{{ old('second_last_name', $info->second_last_name ?? '') }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:border-base-300" required disabled>
                </div>
                
                <div>
                    <label for="identification_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cédula de identidad</label>
                    <input type="text" name="identification_number" id="identification_number" value="{{ old('identification_number', $info->identification_number ?? '') }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:border-base-300" required disabled>
                </div>
                
                <div>
                    <label for="birth_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha de nacimiento</label>
                    <input type="date" name="birth_date" id="birth_date" value="{{ old('birth_date', $info->birth_date ?? '') }}" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:border-base-300" required disabled>
                </div>
                
                <div>
                    <label for="residence" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Residencia</label>
                    <input type="text" name="residence" id="residence" value="{{ old('residence', $info->residence ?? '') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                </div>
                
                <div>
                    <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Teléfono</label>
                    <input type="tel" name="phone" id="phone" value="{{ old('phone', $info->phone ?? '') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                </div>

                <!-- Continúa con el resto de los campos con la misma lógica -->
                <div>
                  <label for="education_level" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nivel de educación</label>
                  <input type="text" name="education_level" id="education_level" value="{{ old('education_level', $info->education_level ?? '') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                </div>
                <div>
                  <label for="institution_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre de la institución</label>
                  <input type="text" name="institution_name" id="institution_name" value="{{ old('institution_name', $info->institution_name ?? '') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                </div>

                <div>
                  <label for="institution_address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dirección de la institución</label>
                  <input type="text" name="institution_address" id="institution_address" value="{{ old('institution_address', $info->institution_address ?? '') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                </div>
        
                <div>
                  <label for="career" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Carrera</label>
                  <input type="text" name="career" id="career" value="{{ old('career', $info->career ?? '') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                </div>
        
                <div>
                  <label for="tshirt_size" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Talla de camiseta</label>
                  <select id="tshirt_size" name="tshirt_size" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <option value="">Seleccionar</option>
                    <option value="S" {{ old('tshirt_size', $info->tshirt_size ?? '') == 'S' ? 'selected' : '' }}>S</option>
                    <option value="M" {{ old('tshirt_size', $info->tshirt_size ?? '') == 'M' ? 'selected' : '' }}>M</option>
                    <option value="L" {{ old('tshirt_size', $info->tshirt_size ?? '') == 'L' ? 'selected' : '' }}>L</option>
                    <option value="XL" {{ old('tshirt_size', $info->tshirt_size ?? '') == 'XL' ? 'selected' : '' }}>XL</option>
                  </select>
                </div>


            </div>
  
        </div>
        <button type="submit" class="inline-flex mb-2 items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-500 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
          Guardar cambios
        </button>
      </form>
    </div>
</section>
