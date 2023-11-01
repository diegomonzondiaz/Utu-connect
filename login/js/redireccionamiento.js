let redirigir = (tipo) => {
    switch(tipo){
        case 'publicaciones':
            window.parent.location.href = window.location.origin+'/UTU-connect/index.html';
            break;
        case 'admin':
            window.parent.location.href = window.location.origin+'/UTU-connect/administradores/adminPage.html';
            break;
        case 'iniciarSesion':
            window.parent.location.href = window.location.origin+'/UTU-connect/login/login.html';
            break;
    }
}

export default redirigir;