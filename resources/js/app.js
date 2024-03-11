let btn_navbar = document.getElementById('btn-navbar');
let content_menu = document.getElementById('navbar-default');
let  latitud = document.getElementById('Latitud');
let longitud = document.getElementById('Longitud');

let option_medida = document.getElementById('Id_medida');
let option_lampara = document.getElementById('Id_lampara');



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
    // console.log("Tu ubicación actual es:");
    // console.log(`Latitud : ${crd.latitude}`);
    // console.log(`Longitud: ${crd.longitude}`);
    // console.log(`Más o menos ${crd.accuracy} metros.`);
    latitud.value = crd.latitude;
    longitud.value = crd.longitude;
}
  
function error(err) {
    console.warn(`ERROR(${err.code}): ${err.message}`);
}

navigator.geolocation.getCurrentPosition(success, error, options);     


/* GUARDAR DATOS */
let form_data = document.getElementById('form-data');

form_data.addEventListener('submit', function (e) {
    e.preventDefault();
    let formdata = new FormData(form_data);

    fetch('/CreateData',{
        method:'post',
        body: formdata,
    })
    .then(response => {
    if (response.ok) {
        return response.json();
    }
        throw new Error('Error al enviar los datos.');
    })
    .then(data => {

        let result =  data.result
        if (result == 1) {
            alert(data.msg);
            form_data.reset();
        } else {
            alert(data.msg);
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
});


function  getmedidas() {
    fetch('/getmedidas',{
        method:'get',
    })
    .then(response => {
        if (response.ok) {
            return response.json();
        } 
    })
    .then(data => {
        var html = '';
        data.forEach(element => {

            html += `<option value="${element.id_medida}">${element.tipo} ${element.descripcion}</option>`
        });      
        option_medida.innerHTML = html;          
    })
    .catch(error => {
        console.error('Error:', error);
    });
}
getmedidas()


function  getlamparas() {
    fetch('/getlamparas',{
        method:'get',
    })
    .then(response => {
        if (response.ok) {
            return response.json();
        } 
    })
    .then(data => {
        var html = '';
        data.forEach(element => {

            html += `<option value="${element.id_medida}">${element.tipo} ${element.descripcion}</option>`
        });      
        option_lampara.innerHTML = html;          
    })
    .catch(error => {
        console.error('Error:', error);
    });
}
getlamparas()



// Ejemplo utilizando localStorage
// if (!navigator.onLine) {
    // Almacena datos localmente si no hay conexión a Internet
    // localStorage.setItem('formularioData', JSON.stringify(datosDelFormulario));
// }


/* ejemplo por si el suario uno tiene internet */
if (navigator.onLine) {
    console.log("tiene internet");
} else {
    console.log("no tiene internet :)");
}

// // Verificar la conexión periódicamente
// setInterval(function() {
//     if (navigator.onLine) {
//         // Recuperar datos almacenados localmente y sincronizar con el servidor
//         var datosAlmacenados = localStorage.getItem('formularioData');
//         if (datosAlmacenados) {
//             // Realizar la sincronización con el servidor
//             // ...
//             // Luego, eliminar los datos almacenados localmente
//             localStorage.removeItem('formularioData');
//         }
//     }
// }, 5000); // Intervalo de verificación (5 segundos en este ejemplo)



