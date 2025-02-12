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
