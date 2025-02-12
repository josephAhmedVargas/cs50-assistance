<div id="details-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-3/4 max-w-auto max-h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
            
            <!-- Modal body -->
            <div class="w-full bg-blue-500 h-14 md:p-5 dark:border-gray-600 rounded-t flex items-center rounded-sm justify-between">
              <div class="icon-title flex items-center rounded-sm">
                  <i class="fa-solid fa-circle-check ml-3" style="color: #63E6BE;"></i>
                  <h4 class="text-white font-semibold text-xl ml-2" id="block-detail-heading2">Hola</h4>
              </div>
              <button type="button" class="text-white bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="details-modal">
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                  </svg>
                  <span class="sr-only">Close modal</span>
              </button>
          </div>
          <div class="p-4 mx-4">
              <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 my-7">
              <div class="grid gap-4 mb-4">
                  <table id="search-table2">
                      <thead>
                          <tr>
                          </tr>
                      </thead>
                      <tbody>
                      </tbody>
                  </table> 
              </div>
              </div>
          </div>
            <!-- Modal footer -->
              <div class="flex justify-end p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="details-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cerrar</button>
              </div>
        </div>
    </div>
</div>