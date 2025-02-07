

<!-- Modal toggle -->
<button data-modal-target="static-modal" data-modal-toggle="static-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
    Toggle modal
  </button>
  
  <!-- Main modal -->
  <div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative p-4 w-3/4 max-w-auto max-h-auto">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
              <!-- Modal header -->
                <div class="modal-header w-full bg-blue-500 h-10 flex items-center rounded-sm">
                    <i class="fa-solid fa-circle-check ml-3" style="color: #63E6BE;"></i>
                    <h4 class="text-white font-semibold text-xl ml-2">Hola</h4>
                </div>
                <div class="p-4 mx-4">
                    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 my-7">
                    <div class="grid gap-4 mb-4">
                        <table id="search-table">
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
              <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                 <button data-modal-hide="static-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cerrar</button>
              </div>
          </div>
      </div>
  </div>

<script>
    
    if (document.getElementById("search-table") && typeof simpleDatatables.DataTable !== 'undefined') {
        const dataTable = new simpleDatatables.DataTable("#search-table", {
            searchable: true,
            sortable: true,
            paging: true,
            data: {
                headings: ["ID", "Nombre de Estudiante", "Código de Estudiante", "Grupo de Clases", "Semana", "Subido por", "Asistencia", "Nota"],
            }
        });
        
    }

</script>
  