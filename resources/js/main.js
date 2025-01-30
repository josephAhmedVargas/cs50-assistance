
// Detectar si la página actual es "attendances" y cargar el script
if (window.location.pathname.includes('/attendances')) {
    import('./attendances.js').then(module => {
        console.log('Attendance script loaded.');
    }).catch(error => console.error('Error loading attendances.js:', error));
}
