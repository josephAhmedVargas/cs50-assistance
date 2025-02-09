
// Detectar si la página actual es "attendances" y cargar el script
if (window.location.pathname.includes('/attendances')) {
    import('./attendances.js').then(module => {
        console.log('Attendance script loaded.');
        if (document.querySelectorAll('.view-details').length > 0) {
            document.querySelectorAll(".view-details").forEach(button => {
                button.addEventListener("click", function() {
                    const dataTableModal = new simpleDatatables.DataTable("#search-table", {
                        searchable: true,
                        sortable: true,
                        paging: true,
                        labels: {
                            noRows: "No hay registros",
                            info: "Mostrando {start} a {end} de {rows} registros",
                            loading: "Cargando...",
                            noResults: "No se encontraron registros",
                        },
                        data: {
                            headings: ["ID", "Nombre de Estudiante", "Código de Estudiante", "Grupo de Clases", "Semana", "Subido por", "Asistencia", "Nota"],
                        }
                    });
                    
                    const $targetEl = document.getElementById('modalEl');

                    // options with default values
                    const options = {
                        placement: 'bottom-right',
                        backdrop: 'dynamic',
                        backdropClasses:
                            'bg-gray-900/50 dark:bg-gray-900/80 fixed inset-0 z-40',
                        closable: true,
                        onHide: () => {
                            console.log('modal is hidden');
                        },
                        onShow: () => {
                            console.log('modal is shown');
                        },
                        onToggle: () => {
                            console.log('modal has been toggled');
                        },
                    };

                    const instanceOptions = {
                        id: 'modalEl',
                        override: true
                      };

                    
                    const date = this.getAttribute("data-date");
                    const block = this.getAttribute("data-block");
                    console.log(date, block);
                    fetch(`/attendances/block/${date}/${block}`)
                        .then(response => response.json())
                        .then(data => {
                            console.log(data);
                            // let tableBody = document.querySelector("#search-table tbody");
                            // tableBody.innerHTML = "";
                            data.attendances.forEach(attendance => {
                                document.getElementById("block-detail-heading").innerHTML = `${date} - ${ data.attendances.length > 1 ? "Multiple Blocks" : (attendance.user_who_registered.name)} - ${(attendance.type) === "office_hour" ? "Office Hours" : "Clases"} - ${block} - S${attendance.office_hour_week ?? attendance.class_number} `
                                attendance.students.forEach(student => {
                                    let studentRow = {
                                        id: student.id,
                                        name: student.info.first_name + " " + student.info.middle_name + " " + student.info.last_name + " " + student.info.second_last_name,
                                        unique_code: student.unique_code,
                                        group: student.group.name,
                                        office_hour_week: attendance.office_hour_week ?? attendance.class_number,
                                        registered_by: attendance.user_who_registered.name,
                                        present: student.pivot.present,
                                        notes: student.pivot.notes ?? 'N/A',
                                    };
                                    dataTableModal.insert({data : [[studentRow.id, studentRow.name, studentRow.unique_code, studentRow.group, studentRow.office_hour_week, studentRow.registered_by, studentRow.present, studentRow.notes]]});

                                    
                                    // let row = `<tr>
                                    //     <td>${student.id}</td>
                                    //     <td>${student.info.first_name + " " + student.info.middle_name + " " + student.info.last_name + " " + student.info.second_last_name}</td>
                                    //     <td>${student.unique_code}</td>
                                    //     <td>${student.group.name}</td>
                                    //     <td>${attendance.office_hour_week ?? attendance.class_number}</td>
                                    //     <td>${attendance.user_who_registered.name}</td>
                                    //     <td>${student.pivot.present ? 'Presente' : 'Ausente'}</td>
                                    //     <td>${student.pivot.notes ?? 'N/A'}</td>
                                    // </tr>`;
                                    // tableBody.innerHTML += row;
                                });
                            });
                        })
                        .catch(error => console.error("Error cargando los datos:", error));
                });
            });
        
            // document.querySelector(".close-modal").addEventListener("click", function() {
            //     // document.getElementById("static-mod").classList.add("hidden");
            //     window.dispatchEvent(new CustomEvent('close-modal', { detail: 'my-modal' }));
            // });

        }
    }).catch(error => console.error('Error loading attendances.js:', error));
}
