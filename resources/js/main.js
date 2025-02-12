
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
                    
                    const date = this.getAttribute("data-date");
                    const block = this.getAttribute("data-block");
                    console.log(date, block);
                    fetch(`/attendances/block/${date}/${block}`)
                        .then(response => response.json())
                        .then(data => {
                            let rowNumber = 1;
                            document.getElementById("block-detail-heading").innerHTML = `${date} - ${ data.attendances.length > 1 ? "Multiple Blocks" : (data.attendances[0].user_who_registered.name)} - ${(data.attendances[0].type) === "office_hour" ? "Office Hours" : "Clases"} - ${block} - S${data.attendances[0].office_hour_week ?? data.attendances[0].class_number} `
                            data.attendances.forEach(attendance => {
                                attendance.students.forEach(student => {
                                    console.log(student);
                                    let studentRow = {
                                        id: rowNumber,
                                        name: student.info.first_name + " " + student.info.middle_name + " " + student.info.last_name + " " + student.info.second_last_name,
                                        unique_code: student.unique_code,
                                        group: student.group.name,
                                        office_hour_week: attendance.office_hour_week ?? attendance.class_number,
                                        registered_by: attendance.user_who_registered.name,
                                        present: student.pivot.present ? 'Presente' : 'Ausente',
                                        notes: student.pivot.notes ?? 'N/A',
                                    };
                                    dataTableModal.insert({data : [[rowNumber, studentRow.name, studentRow.unique_code, studentRow.group, studentRow.office_hour_week, studentRow.registered_by, studentRow.present, studentRow.notes]]});
                                    rowNumber++;
                                });
                            });
                        })
                        .catch(error => console.error("Error cargando los datos:", error));
                });
            });

            if (document.querySelectorAll('.view-details-user').length > 0) {
                document.querySelectorAll(".view-details-user").forEach(button => {
                    button.addEventListener("click", function() {
                      
                        const dataTableModal = new simpleDatatables.DataTable("#search-table2", {
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
            
                        const date = this.getAttribute("data-date");
                        const block = this.getAttribute("data-block");
                        const user_id = this.getAttribute("data-user_id");
            
                        fetch(`/attendances/block/${date}/${block}/${user_id}`)
                            .then(response => response.json())
                            .then(data => {
                                console.log(data);
                                document.getElementById("block-detail-heading2").innerHTML = 
                                    `${date} - ${data.attendances[0].user_who_registered.name} - 
                                    ${data.attendances[0].type === "office_hour" ? "Office Hours" : "Clases"} - ${block} - 
                                    S${data.attendances[0].office_hour_week ?? data.attendances[0].class_number}`;
            
                                let rowNumber = 1;
                                data.attendances.forEach(attendance => {
                                    attendance.students.forEach(student => {
                                        let studentRow = [
                                            rowNumber,
                                            `${student.info.first_name} ${student.info.middle_name} ${student.info.last_name} ${student.info.second_last_name}`,
                                            student.unique_code,
                                            student.group.name,
                                            attendance.office_hour_week ?? attendance.class_number,
                                            attendance.user_who_registered.name,
                                            student.pivot.present ? 'Presente' : 'Ausente',
                                            student.pivot.notes ?? 'N/A',
                                        ];
                                        dataTableModal.insert({ data: [studentRow] });
                                        rowNumber++;
                                    });
                                });
                            })
                            .catch(error => console.error("Error cargando los datos:", error));
                    });
                });
            }
            

        }
    }).catch(error => console.error('Error loading attendances.js:', error));
}
