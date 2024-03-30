import $ from "jquery";
import DataTable from 'datatables.net-dt';
import TomSelect from "tom-select";
import 'tom-select/dist/css/tom-select.css';
import 'datatables.net-dt/css/dataTables.dataTables.min.css';
import 'tom-select/dist/js/tom-select.complete'

/* menu */
let btn_navbar = document.getElementById('btn-navbar');
let content_menu = document.getElementById('navbar-default');

$(document).ready(function () {

    let table = new DataTable('#table', {
        reponsive: true,
        processing: true,   
        searching: true,     
        // serverSide: true,
        ajax: {
            url: '/gettable',
            dataSrc: 'data'
        },
        columnDefs:[
            {
            "targets": [0, 8], // Índice de la columna que deseas ocultar (comienza desde 0)
            "visible": false, // Establece esta columna como no visible
           }
        ],
        columns:[ 
            { data: 'id'},
            { data: 'boton' },            
            { data: 'Sm_Av'},
            { data: 'Latitud'},
            { data: 'Longitud'},
            { data: 'Circuito'},
            { data: 'Etiqueta'},
            { data: 'Luminarias'},            
            { data: 'created_at'},
            { data: 'show_fecha'},
            { data: 'NumMedidor'},
            { data: 'Observaciones'},            
        ]
    });

    $('#table tbody').on('click', '#btn_show', function() {
        var rowData = table.row($(this).closest('tr')).data(); // Obtener los datos de la fila
        var id = rowData.id; // Obtener el valor de la columna 'id' de los datos de la fila
        console.log('ID: ' + id);
    });

    let  id_medida = document.getElementById("Id_medida_fk");
    let  id_lampara = document.getElementById("Id_lampara_fk");
    let Id_potencia_fk  = document.getElementById("Id_potencia_fk");
    let  Id_poste_fk = document.getElementById("Id_poste_fk");
    let Id_dependencia_fk  = document.getElementById("Id_dependencia_fk");
    let  Id_altura_fk = document.getElementById("Id_altura_fk");
    let  Id_transformador_fk = document.getElementById("Id_transformador_fk");
    let  Id_estatus_fk = document.getElementById("Id_estatus_fk");
    let  id_tipoLuminaria_fk = document.getElementById("id_tipoLuminaria_fk");


    if (id_medida) {
        new TomSelect("#Id_medida_fk", {            
            create: true,        
            sortField: {
                field: "text",
                direction: "desc"
            }
        });    
    }

    if (id_lampara) {
        new TomSelect("#Id_lampara_fk", {
            create: true,        
            sortField: {
                field: "text",
                direction: "desc"
            }
        });    
    }
    
    if (Id_potencia_fk) {
        new TomSelect("#Id_potencia_fk", {
            create: true,
            sortField: {
                field: "text",
                direction: "desc"
            }
        });    
    }

    if (Id_poste_fk) {
        new TomSelect("#Id_poste_fk", {
            create: true,
            sortField: {
                field: "text",
                direction: "desc"
            }
        });    
    }

    if (Id_dependencia_fk) {
        new TomSelect("#Id_dependencia_fk", {
            create: true,
            sortField: {
                field: "text",
                direction: "desc"
            }
        });    
    }

    if (Id_altura_fk) {
        new TomSelect("#Id_altura_fk", {
            create: true,
            sortField: {
                field: "text",
                direction: "desc"
            }
        });    
    }

    if (Id_transformador_fk) {
        new TomSelect("#Id_transformador_fk", {
            create: true,
            sortField: {
                field: "text",
                direction: "desc"
            }
        });    
    }

    if (Id_estatus_fk) {
        new TomSelect("#Id_estatus_fk", {
            create: true,
            sortField: {
                field: "text",
                direction: "desc"
            }
        });    
    }

    
    if (id_tipoLuminaria_fk) {
        new TomSelect("#id_tipoLuminaria_fk", {
            create: true,
            sortField: {
                field: "text",
                direction: "desc"
            }
        });    
    }

    $("#form-data").on('submit', function (e) {
        e.preventDefault();        
        var formData = $(this).serialize();        
        $.ajax({
            type: 'POST',
            url: '/CreateData', 
            data: formData,                     
            success: function(data){                       
                var result = data.result
                if (result == 1) {
                    $(".hidden_msg").addClass('hidden');
                    alert(data.msg)                   
                }
            },
            error: function(xhr, status, error){        
                let errors  = xhr.responseJSON.errors;  
                console.error(error)
                if (errors.Circuito) {
                    $("#msg_error_circuito").removeClass('hidden')
                    $("#msg_error_circuito").text(errors.Circuito)           
                } else {
                    $("#msg_error_circuito").addClass('hidden')
                    $("#msg_error_circuito").text('')
                }

                if (errors.Sm_Av) {                    
                    $("#msg_error_sm_av").removeClass('hidden')
                    $("#msg_error_sm_av").text(errors.Sm_Av)            
                } else {
                    $("#msg_error_sm_av").addClass('hidden')
                    $("#msg_error_sm_av").text('')  
                }      
            }
        });
    });
})

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
    $("#Latitud").val(crd.latitude)
    $("#Longitud").val(crd.longitude)
    // latitud.value = crd.latitude;
    // longitud.value = crd.longitude;
}
  
function error(err) {
    console.warn(`ERROR(${err.code}): ${err.message}`);
}

navigator.geolocation.getCurrentPosition(success, error, options);     


/* GUARDAR DATOS */
// form_data.addEventListener('keydown', keydowOff)
// function keydowOff(e) {
//     if (e.key === 'Enter') {
//         e.preventDefault(); // Evitar la acción predeterminada del Enter
//     }
// }


// console.log("Tu ubicación actual es:");
// console.log(`Latitud : ${crd.latitude}`);
// console.log(`Longitud: ${crd.longitude}`);
// console.log(`Más o menos ${crd.accuracy} metros.`);

/* ejemplo por si el suario uno tiene internet */
// if (navigator.onLine) {
//     console.log("tiene internet :)");
    
// } else {
//     console.log("no tiene internet :(");

//     let a_lampara = [
//         {id_lampara: 1, tipo: 'AM', descripcion: 'Aditivo Metálico'},
//         {id_lampara: 2, tipo: 'Ahorrador', descripcion: 'Ahorrador'},
//         {id_lampara: 3, tipo: 'Colonial Hacienda', descripcion: 'Colonial Hacienda'},
//         {id_lampara: 4, tipo: 'CM', descripcion: 'Colonial Mexicana'},
//         {id_lampara: 5, tipo: 'Fluorescente', descripcion: 'Fluorescente'},
//         {id_lampara: 6, tipo: 'HP', descripcion: 'Holophane'}
//     ]

//     let a_medida = [
//         {id_medida: 1, tipo: 'BMT-BC', descripcion: 'Medidas media tension'},
//         {id_medida: 2, tipo: 'BBT-BC', descripcion: 'Medidas baja tension'},
//         {id_medida: 3, tipo: 'NBBT-BC', descripcion: 'No medidas baja tension'} ,
//         {id_medida: 4, tipo: 'Directas', descripcion: 'Directas'},
//         {id_medida: 5, tipo: 'DTA', descripcion: 'Directas'}
//     ]

//     var html_lampara = '';
//     a_lampara.forEach(element => {
//         html_lampara += `<option value="${element.id_lampara}">${element.tipo} ${element.descripcion}</option>`
//     });
//     option_lampara.innerHTML = html_lampara; 


//     var html_medida = '';
//     a_lampara.forEach(element => {
//         html_medida += `<option value="${element.id_lampara}">${element.tipo} ${element.descripcion}</option>`
//     });
//     option_medida.innerHTML = html_medida; 
// }