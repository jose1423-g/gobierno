let btn_navbar = document.getElementById('btn-navbar');
let content_menu = document.getElementById('navbar-default');

btn_navbar.addEventListener('click', DisplayMenu);

function DisplayMenu() {
    if (content_menu.classList.contains('hidden')) {
        content_menu.classList.remove('hidden')    
    } else {
        content_menu.classList.add('hidden')    
    }
}

/* obtiene la ubicacion actual del usuario */
const options = {
    enableHighAccuracy: false,
    timeout: 5000,
    maximumAge: 0,
};
  
function success(pos) {
    const crd = pos.coords;
  
    console.log("Tu ubicación actual es:");
    console.log(`Latitud : ${crd.latitude}`);
    console.log(`Longitud: ${crd.longitude}`);
    console.log(`Más o menos ${crd.accuracy} metros.`);
}
  
function error(err) {
    console.warn(`ERROR(${err.code}): ${err.message}`);
}

navigator.geolocation.getCurrentPosition(success, error, options);     


/* ejemplo por si el suario uno tiene internet */
if (navigator.onLine) {
    // El usuario tiene conexión a Internet
} else {
    // El usuario no tiene conexión a Internet
}


// Ejemplo utilizando localStorage
if (!navigator.onLine) {
    // Almacena datos localmente si no hay conexión a Internet
    localStorage.setItem('formularioData', JSON.stringify(datosDelFormulario));
}


// Verificar la conexión periódicamente
setInterval(function() {
    if (navigator.onLine) {
        // Recuperar datos almacenados localmente y sincronizar con el servidor
        var datosAlmacenados = localStorage.getItem('formularioData');
        if (datosAlmacenados) {
            // Realizar la sincronización con el servidor
            // ...
            // Luego, eliminar los datos almacenados localmente
            localStorage.removeItem('formularioData');
        }
    }
}, 5000); // Intervalo de verificación (5 segundos en este ejemplo)



