<div class="container mx-auto py-8">
    <h2 class="text-2xl font-semibold mb-4">Registro de Asistencia</h2>

    <form id="attendance-form" class="space-y-4 mb-8" action="{{ route('asistencia.guardar') }}" method="POST">
        @csrf
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label for="programa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Programa</label>
                <select id="programa" name="programa_id" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="1">CS50</option>
                </select>
            </div>
            <div>
                <label for="cycle_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Ciclo</label>
                <select id="cycle_id" name="cycle_id" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="1">Y25C1</option>
                </select>
            </div>
            <div>
                <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Actividad</label>
                <select id="type" name="type" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="class">Clase</option>
                    <option value="office_hour">Office Hour</option>
                </select>
            </div>
            <div id="class-container">
                <label for="class_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Clase</label>
                <select id="class_number" name="class_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="">Seleccionar Clase</option> 
                    <option value="1">C01</option>
                    <option value="2">C02</option>
                    <option value="3">C03</option>
                    <option value="4">C04</option>
                    <option value="5">C05</option>
                    <option value="6">C06</option>
                </select>
            </div>
            <div id="office-container" class="hidden">
                <label for="office_hour_week" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Semana</label>
                <select id="office_hour_week" name="office_hour_week" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="">Seleccionar Semana</option>
                    <option value="1">Semana 1</option>
                    <option value="2">Semana 2</option>
                    <option value="3">Semana 3</option>
                    <option value="4">Semana 4</option>
                    <option value="5">Semana 5</option>
                    <option value="6">Semana 6</option>
                </select>
            </div>
            <div>
                <label for="fecha" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Fecha</label>
                <input type="date" id="fecha" name="fechaBloque" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div>
                <label for="horario" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Horario</label>
                <select id="horario" name="schedule" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="">Seleccione una opción</option> 
                    <option value="8-10">8:00 - 10:00</option>
                    <option value="10-12">10:00 - 12:00</option>
                    <option value="1-3">01:00 - 03:00</option>
                    <option value="3-5">03:00 - 05:00</option>
                </select>
            </div>

            <div class="mt-10 w-full">
                <h2 class="text-2xl font-semibold mb-4">Agregar Estudiantes</h2>
                {{-- <div class="mb-4">
                    <label for="search-student" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Buscar estudiante</label>
                    <input type="text" id="search-student" placeholder="Buscar estudiante..." class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div> --}}
                <div class="mb-4 relative">
                    <input type="text" id="search-student" class="w-full px-4 py-2 border rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300" placeholder="Buscar estudiante...">
                    <ul id="search-results" class="absolute w-full bg-white border rounded-md mt-1 max-h-60 overflow-y-auto shadow-lg hidden"></ul>
                </div>
                <div class="mb-4">
                    <label for="attendance" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Asistencia</label>
                    <select id="attendance" name="attendance" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="Asistio">Asistio</option>
                        <option value="No asistio">No asistio</option>
                    </select>
                </div>

                <div id="hours-container" class="hidden">
                    <label for="hours_attended" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Horas Cumplidas</label>
                    <select id="hours_attended" name="hours_attended" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="0.5">0.5</option>
                        <option value="1">1</option>
                        <option value="1.5">1.5</option>
                        <option value="2">2</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="note" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nota/Justificación</label>
                    <textarea id="note" name="note" rows="4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                </div>
                <div class="mt-4">
                    <button id="agregar_estudiante" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Agregar Estudiante</button>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto relative mt-8">
            <table id="sorting-table">
                <thead>
                    <tr>
                        
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            
            <div class="mt-4">
                <button type="submit" id="guardar_asistencia" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Guardar Asistencia</button>
            </div>
 
        </div>

        <input type="hidden" name="student_ids" id="hidden_input">
        <input type="hidden" name="selected_students" id="hidden_zzz">
    </form>
    
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        
    const fechaActual = new Date().toISOString().split('T')[0];

    document.getElementById("fecha").value = fechaActual;

    let selectedStudents = [];
    let listStudents = [];
    let selectedStudentIds = [];
    let cumplimientoData = [];

    let numberStudents = 0;

    let searchInput = document.getElementById("search-student");
    let resultsList = document.getElementById("search-results");
    let timeout = null;

    let tableHeadings = ["ID", "Nombre", "Código", "Grupo", "Asistencia", "Nota", "Cumplimiento", "Acciones"];

    let type = document.getElementById("type").value; // Obtener el valor del elemento con id "type"

    const dataTable = new simpleDatatables.DataTable("#sorting-table", {
                searchable: false,
                perPageSelect: false,
                sortable: true,
                labels: {
                    noRows: "No hay registros",
                    info: "Mostrando {start} a {end} de {rows} registros",
                    loading: "Cargando...",
                    noResults: "No se encontraron registros",
                },
                data: {
                    headings: tableHeadings,
                }
            });
            let columns = dataTable.columns;
            columns.remove(6);
    
            document.getElementById("type").addEventListener("change", function() {
                
                type = this.value;

                let classContainer = document.getElementById("class-container");
                let officeContainer = document.getElementById("office-container");
                let hoursContainer = document.getElementById("hours-container");

                if (type === "class") {
                    classContainer.classList.remove("hidden");
                    officeContainer.classList.add("hidden");
                    hoursContainer.classList.add("hidden");
                    columns.remove(6);

                } else if (type === "office_hour") {
                    classContainer.classList.add("hidden");
                    officeContainer.classList.remove("hidden");
                    hoursContainer.classList.remove("hidden");
                    let newHeading = {
                        heading: "Cumplimiento",
                    }
                    columns.add(newHeading);
                    columns.order[0,1,2,3,4,7,5,6]
                    columns.swap([6, 7]);

                }
            });

    // Buscar estudiantes en tiempo real
    document.getElementById("search-student").addEventListener("input", function () {
        //porsiaca bloc de notas
        clearTimeout(timeout);
        let query = searchInput.value.trim();
        if (query.length >= 1) {
            timeout = setTimeout(() => {
                fetch(`/api/estudiantes?q=${query}`)
                    .then(response => response.json())
                    .then(data => {
                        resultsList.innerHTML = "";
                        if (data.length > 0) {
                            data.forEach(student => {
                                let li = document.createElement("li");
                                let uniqueCode = student.user.unique_code;
                                let group = student.group.name;
                                let fullName = uniqueCode + " - " + student.first_name + " " + student.middle_name + " " + student.last_name + " " + student.second_last_name + " - " + group;
                                li.textContent = fullName;
                                li.dataset.id = student.user_id;
                                li.classList.add("px-4", "py-2", "cursor-pointer", "hover:bg-gray-200");
                                li.addEventListener("click", function () {
                                    let student_found = data.find(s => s.user_id == this.dataset.id);
                                    let fullNameStudent = student_found.first_name + " " + student_found.middle_name + " " + student_found.last_name + " " + student_found.second_last_name;
                                    searchInput.value = fullName;
                                    searchInput.dataset.id = student.user_id;
                                    searchInput.dataset.name = fullNameStudent;
                                    searchInput.dataset.code = student_found.user.unique_code;
                                    searchInput.dataset.group = student_found.group.name;
                                    resultsList.classList.add("hidden");
                                });
                                resultsList.appendChild(li);
                            });
                            resultsList.classList.remove("hidden");
                        } else {
                            resultsList.classList.add("hidden");
                        }
                    });
            }, 300);
        } else {
            resultsList.classList.add("hidden");
        }
    });

    // Agregar estudiante a la tabla
    document.getElementById("agregar_estudiante").addEventListener("click", function (e) {
        e.preventDefault();
        let searchInput = document.getElementById("search-student");
        let studentId = document.getElementById("search-student").dataset.id;
        let studentName = document.getElementById("search-student").dataset.name;
        let studentCode = document.getElementById("search-student").dataset.code;
        let studentGroup = document.getElementById("search-student").dataset.group;
        let attendance = document.getElementById("attendance").value;
        let hours_attended = document.getElementById("hours_attended").value;
        let type = document.getElementById("type").value;
        let note = document.getElementById("note").value;
        if (!studentId || selectedStudentIds.includes(studentId)) {
            return alert("Estudiante ya añadido o no seleccionado.");
        }
        numberStudents++;
        if (type == "office_hour") {
            console.log(type);
            let studentData = { id: studentId, nombre: studentName, codigo: studentCode, grupo: studentGroup, asistencia: attendance, nota: note, horas_atendidas: hours_attended ?? null };
            selectedStudents.push(studentData);
            dataTable.insert({data : 
            [[numberStudents, studentName, studentCode, studentGroup, attendance, note, hours_attended, `<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button> 
             <button class="delete-student bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" data-id="${studentData.id}">Delete</button>`
            ]]
        });
        } else {
            let studentData = { id: studentId, nombre: studentName, codigo: studentCode, grupo: studentGroup, asistencia: attendance, nota: note };
            selectedStudents.push(studentData);
            dataTable.insert({data : 
            [[numberStudents, studentName, studentCode, studentGroup, attendance, note, `<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button> 
             <button class="delete-student bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" data-id="${studentData.id}">Delete</button>`
            ]]
        });
        }
        // let studentData = { id: studentId, nombre: studentName, codigo: studentCode, grupo: studentGroup, asistencia: attendance, nota: note, horas_atendidas: type === "office_hour" ? hours_attended : null };
        selectedStudentIds.push(studentId);
        
        console.log("Estudiantes seleccionados:", selectedStudents);
        // let newRows = tempList;
        // console.log(tempList);

        // dataTable.insert({data : 
        //     [[numberStudents, studentName, studentCode, studentGroup, attendance, note, `<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button> 
        //      <button class="delete-student bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" data-id="${studentData.id}">Delete</button>`
        //     ]]
        // });
        searchInput.value = "";      // Borra el texto del input
        searchInput.dataset.id = ""; // Limpia el ID
        searchInput.dataset.name = "";
        searchInput.dataset.code = "";
        searchInput.dataset.group = "";
        document.getElementById("note").value = "";
        // Ocultar lista de resultados por si aún está visible
        document.getElementById("search-results").classList.add("hidden");
        console.log("Estudiantes seleccionados:", selectedStudentIds);
        document.getElementById("hidden_input").value = JSON.stringify(selectedStudentIds);
        document.getElementById("hidden_zzz").value = JSON.stringify(selectedStudents);
    });

    // Eliminar estudiante de la tabla
    document.addEventListener("click", function (e) {
        if (e.target.classList.contains("delete-student")) {
            e.preventDefault();
            let id = e.target.dataset.id;
            selectedStudentIds = selectedStudentIds.filter(s => s !== id);
            selectedStudents = selectedStudents.filter(s => s.id !== id);
            let rowToRemove = e.target.closest("tr");
            dataTable.rows.remove(parseInt(rowToRemove.dataset.index));
            numberStudents--;
            console.log("IDs después de eliminar:", selectedStudentIds);
            document.getElementById("hidden_input").value = JSON.stringify(selectedStudentIds);
            document.getElementById("hidden_zzz").value = JSON.stringify(selectedStudents);
        }
    });
});

</script>