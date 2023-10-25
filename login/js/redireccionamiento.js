let redirigir = (tipo) => {
    switch(tipo){
        case 'alumno':
            window.parent.location.href = window.location.origin+'/UTU-connect/alumnos/alumnos-page.html';
            break;
        case 'admin':
            window.parent.location.href = window.location.origin+'/UTU-connect/administradores/adminPage.html';
            break;
        case 'docente':
            window.parent.location.href = window.location.origin+'/UTU-connect/docentes/docentes-page.html';
            break;

        case 'iniciarSesion':
            window.parent.location.href = window.location.origin+'/UTU-connect/login.html';
            break;
    }
}

export default redirigir;