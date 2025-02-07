<section class="bg-white dark:bg-gray-900 mb-4">
    <div class="px-4 mx-auto">
        <form action="{{ route('password.update')}}" method="POST">
            @csrf
            @method('put')
            <div class="sm:col-span-2 lg:w-xl space-y-4 md:w-md">

                <div class="">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Usuario</label>
                    <input type="text" name="name" value="{{ old('first_name', auth()->user()->name) }}" id="name" class="mb-5 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" required="" disabled>
                </div>
                <div class="">
                    <label for="current_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contraseña actual</label>
                    <input type="password" name="current_password" id="current_password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                    <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                </div>

                <div class="">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nueva contraseña</label>
                    <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                    <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                </div>
                
                <div class="">
                    <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirmar la nueva contraseña</label>
                    <input type="password" name="password_confirmation" id="confirm_password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                    <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                </div>
        
            </div>
            <div>
                <button type="submit" class="inline-flex mb-2 items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-500 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    Guardar cambios
                </button>
                @if (session('status') === 'password-updated')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600 dark:text-gray-400"
                    >{{ __('Saved.') }}</p>
                @endif
            </div>

        </form>
    </div>
  </section>
