<div class="container mx-auto py-8">
    <h2 class="text-2xl font-semibold mb-4">Registro de Asistencia</h2>

    <form id="attendance-form" class="space-y-4 mb-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label for="programa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Programa</label>
                <select id="programa" name="programa_id" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="">Seleccionar Programa</option> 
                    {/* Opciones dinámicas aquí */}
                </select>
            </div>
            <div>
                <label for="ciclo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Ciclo</label>
                <select id="ciclo" name="ciclo_id" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="">Seleccionar Ciclo</option> 
                    {/* Opciones dinámicas aquí */}
                </select>
            </div>
            <div>
                <label for="actividad" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Actividad</label>
                <select id="actividad" name="actividad_id" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="">Seleccionar Actividad</option> 
                    {/* Opciones dinámicas aquí */}
                </select>
            </div>
            <div>
                <label for="clase" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Clase</label>
                <select id="clase" name="clase_id" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="">Seleccionar Clase</option> 
                    {/* Opciones dinámicas aquí */}
                </select>
            </div>
            <div>
                <label for="fecha" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Fecha</label>
                <input type="date" id="fecha" name="fechaBloque" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div>
                <label for="horario" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Horario</label>
                <select id="horario" name="horario_id" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="">Seleccionar Horario</option> 
                    {/* Opciones dinámicas aquí */}
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

                <div class="mb-4">
                    <label for="note" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nota/Justificación</label>
                    <textarea id="note" name="note" rows="4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                </div>
                <div class="mt-4">
                    <button type="submit" id="agregar_estudiante" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Agregar Estudiante</button>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto relative mt-8">
            <table id="default-table" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nombre
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Código
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Grupo
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Asistencia
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nota
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            <div class="mt-4">
                <button type="submit" id="guardar_asistencia" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Guardar Asistencia</button>
            </div>
        </div>
    </form>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
    let selectedStudents = [];

    let searchInput = document.getElementById("search-student");
    let resultsList = document.getElementById("search-results");
    let timeout = null;

    // Buscar estudiantes en tiempo real
    document.getElementById("search-student").addEventListener("input", function () {
        // let query = this.value;
        // if (query.length < 2) return;
        // fetch(`/api/estudiantes?q=${query}`)
        //     .then(response => response.json())
        //     .then(data => {
        //         console.log(data);
        //         let suggestions = document.createElement("ul");
        //         suggestions.classList.add("absolute", "bg-white", "border", "rounded-md", "w-full", "mt-1");
        //         data.forEach(student => {
        //             let item = document.createElement("li");
        //             item.classList.add("p-2", "cursor-pointer", "hover:bg-gray-200");
        //             item.textContent = `${student.name} (${student.id})`;
        //             item.dataset.id = student.id;
        //             item.dataset.nombre = student.name;
        //             item.dataset.codigo = student.codigo;
        //             item.dataset.grupo = student.grupo;
        //             item.addEventListener("click", function () {
        //                 document.getElementById("search-student").value = this.textContent;
        //                 document.getElementById("search-student").dataset.id = this.dataset.id;
        //                 document.getElementById("search-student").dataset.name = this.dataset.nombre;
        //                 suggestions.innerHTML = "";
        //             });
        //             suggestions.appendChild(item);
        //         });
        //         this.parentNode.appendChild(suggestions);
        //     });
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
                                let fullName = uniqueCode + " - " + student.first_name + " " + student.middle_name + " " + student.last_name + " " + student.second_last_name;
                                li.textContent = fullName;
                                li.dataset.id = student.id;
                                li.classList.add("px-4", "py-2", "cursor-pointer", "hover:bg-gray-200");
                                li.addEventListener("click", function () {
                                    let student_found = data.find(s => s.id == this.dataset.id);
                                    let fullNameStudent = student_found.first_name + " " + student_found.middle_name + " " + student_found.last_name + " " + student_found.second_last_name;
                                    searchInput.value = fullNameStudent;
                                    searchInput.dataset.id = student.id;
                                    searchInput.dataset.name = fullNameStudent;
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
        let studentId = document.getElementById("search-student").dataset.id;
        let studentName = document.getElementById("search-student").dataset.name;
        let attendance = document.getElementById("attendance").value;
        let note = document.getElementById("note").value;
        if (!studentId || selectedStudents.some(s => s.id == studentId)) return alert("Estudiante ya añadido o no seleccionado.");
        let studentData = { id: studentId, nombre: studentName, asistencia: attendance, nota: note };
        selectedStudents.push(studentData);
        document.querySelector("#default-table tbody").innerHTML += `
            <tr>
                <td>${studentData.id}</td>
                <td>${studentData.nombre}</td>
                <td>${studentData.asistencia}</td>
                <td>${studentData.nota || "-"}</td>
                <td><button class="delete-student" data-id="${studentData.id}">❌</button></td>
            </tr>`;
    });

    // Eliminar estudiante de la tabla
    document.addEventListener("click", function (e) {
        if (e.target.classList.contains("delete-student")) {
            let id = e.target.dataset.id;
            selectedStudents = selectedStudents.filter(s => s.id != id);
            e.target.closest("tr").remove();
        }
    });

    // Guardar asistencia
    document.getElementById("guardar_asistencia").addEventListener("click", function (e) {
        e.preventDefault();
        let formData = new FormData(document.getElementById("attendance-form"));
        formData.append("estudiantes", JSON.stringify(selectedStudents));
        fetch("/api/guardar-asistencia", {
            method: "POST",
            headers: { "X-CSRF-TOKEN": document.querySelector("meta[name='csrf-token']").content },
            body: formData
        }).then(response => response.json())
        .then(data => {
            alert("Asistencia guardada con éxito");
            location.reload();
        });
    });
});

</script>