import $ from "jquery";
import 'flowbite';
import DataTable from 'datatables.net-dt';
import TomSelect from "tom-select";
import 'tom-select/dist/css/tom-select.css';
import 'datatables.net-dt/css/dataTables.dataTables.min.css';
import 'tom-select/dist/js/tom-select.complete'
import { formToJSON } from "axios";
$(document).ready(function () {
    
    /* menu */
    let btn_navbar = document.getElementById('btn-navbar');
    let content_menu = document.getElementById('navbar-default');
    let a_data = [];
    let latitud = '';
    let longitud = '';

    let table = new DataTable('#table', {
        reponsive: true,
        processing: true,   
        searching: true,     
        // serverSide: true,
        ajax: {
            url: '/gettable',
            dataSrc: 'data'
        },
        "columnDefs":[
            {
            "targets": [0, 8], // Índice de la columna que deseas ocultar (comienza desde 0)
            "visible": false, // Establece esta columna como no visible
            "searchable": false
           }           
        ],
        "columns":[ 
            { data: 'id'},
            { data: 'boton'},            
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
        $("#Modal_static").removeClass('hidden')  
        $("#Modal_static").addClass('flex')        
        $("#id").val(id);
        ShowData(id)    
    });

    /* CIERRAN EL MODAL */
    $("#btn_close_modal").on('click', function () {        
        $("#Modal_static").addClass('hidden')
    })

    $("#btn_cancelar_modal").on('click',  function () {
        $("#Modal_static").addClass('hidden')
    })

    let table_users = new DataTable('#table_users', {
        reponsive: true,
        processing: true,   
        searching: true,     
        // serverSide: true,
        ajax: {
            url: '/getusers',
            dataSrc: 'data'
        },
        "columnDefs":[
            {
            "targets": [0], // Índice de la columna que deseas ocultar (comienza desde 0)
            "visible": true, // Establece esta columna como no visible
            "searchable": false
           }           
        ],
        "columns":[ 
            { data: 'id'},
            { data: 'boton'},
            { data: 'name'},            
            { data: 'email'},                  
        ]
    });

    /* OBTIENE EL ID DE LA TABLA USUSARIOS */
    $('#table_users tbody').on('click', '#btn_show_user', function() {
        var rowData = table_users.row($(this).closest('tr')).data(); // Obtener los datos de la fila
        var id = rowData.id; // Obtener el valor de la columna 'id' de los datos de la fila        
        $("#Modal_static_users").removeClass('hidden')
        $("#Modal_static_users").addClass('flex')        
        $("#id_user").val(id);
        ShowUsers(id)    
    });

    $("#btn_show_modal_user").on('click', function () {
        $("#Modal_static_users").removeClass('hidden')
        $("#name").val('');
        $("#email").val('');
        $("#EsAdmin").prop('checked', false); 
    })

    /* CIERRAN EL MODAL */
    $("#btn_close_modal_users").on('click', function () {        
        $("#Modal_static_users").addClass('hidden')
    })

    $("#btn_cancelar_modal_users").on('click',  function () {
        $("#Modal_static_users").addClass('hidden')
    })

    $("#form_create_users").on('submit', CreateUser);


    function ShowUsers(id) {                
        $.ajax({
            type: 'GET',
            url: '/ShowUsers', 
            data:{
                id: id                        
            },                    
            success: function(data){                              
                data.forEach(element => {                               
                    // $("#id_user").val(data.id)
                    $("#name").val(element.name)
                    $("#email").val(element.email)                    
                    if (element.EsAdmin) {
                        $("#EsAdmin").prop('checked', true);
                    } else {
                        $("#EsAdmin").prop('checked', false);
                    }

                    
                });                
            },
            error: function(xhr, status, error){        
                console.error(error)                
            }
        });
    }

    /* MUESTRA LOS DATOS EN EL MODAL */
    function ShowData(id) {                
        $.ajax({
            type: 'GET',
            url: '/ShowData', 
            data:{
                id: id                        
            },                    
            success: function(data){  

                data.forEach(element => {                               
                    $("#Sm_Av").val(element.Sm_Av)
                    $("#Latitud").val(element.Latitud)
                    $("#Longitud").val(element.Longitud)
                    $("#Id_medida_fk").val(element.Id_medida_fk)
                    $("#Id_transformador_fk").val(element.Id_transformador_fk)
                    $("#Circuito").val(element.Circuito)
                    $("#NumMedidor").val(element.NumMedidor)
                    $("#Luminarias").val(element.Luminarias)
                    $("#Id_estatus_fk").val(element.Id_estatus_fk)
                    $("#Id_lampara_fk").val(element.Id_lampara_fk)
                    $("#id_tipoLuminaria_fk").val(element.id_tipoLuminaria_fk)
                    $("#Id_potencia_fk").val(element.Id_potencia_fk)
                    $("#Etiqueta").val(element.Etiqueta)
                    $("#Id_poste_fk").val(element.Id_poste_fk)
                    $("#Id_dependencia_fk").val(element.Id_dependencia_fk)
                    $("#Id_altura_fk").val(element.Id_altura_fk)
                    $("#Observaciones").val(element.Observaciones)
                });                
            },
            error: function(xhr, status, error){        
                console.error(error)                
            }
        });
    }

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
    
    $("#form-data").on('submit',  Create);        
    $("#form_update").on('submit', Update); 
    // $("#btn_cerrar_censo").on('click', Close);
    btn_navbar.addEventListener('click', DisplayMenu);

    /* CREATE USER */
    function CreateUser (e) {
        $("#load_spinner").removeClass('hidden');
        $("#load_spinner").addClass('flex');
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: '/create_users', 
            data: formData,                     
            success: function(data){                       
                var result = data.result
                if (result == 1) {
                    $("#load_spinner").removeClass('flex')
                    $("#load_spinner").addClass('hidden')
                    $(".hidden_msg").addClass('hidden');
                    alert(data.msg)                    
                } else {                    
                    $("#load_spinner").removeClass('flex')
                    $("#load_spinner").addClass('hidden') 
                    alert(data.msg)
                }
            },
            error: function(xhr, status, error){        
                let errors  = xhr.responseJSON.errors;                                  
                $("#load_spinner").addClass('hidden')                
                if (errors.name) {                    
                    $("#msg_error_name").removeClass('hidden')
                    $("#msg_error_name").text(errors.name)            
                } else {
                    $("#msg_error_name").addClass('hidden')
                    $("#msg_error_name").text('')  
                }              

                if (errors.email) {
                    $("#msg_error_email").removeClass('hidden')
                    $("#msg_error_email").text(errors.email)           
                } else {
                    $("#msg_error_email").addClass('hidden')
                    $("#msg_error_email").text('')
                }

                if (errors.password) {                    
                    $("#msg_error_pass").removeClass('hidden')
                    $("#msg_error_pass").text(errors.password)            
                } else {
                    $("#msg_error_pass").addClass('hidden')
                    $("#msg_error_pass").text('')  
                }                  
                    
            }
        });
    }
    
    /* CREA UN NUEVO Censo */
    function Create (e) {
        $("#load_spinner").removeClass('hidden');
        $("#load_spinner").addClass('flex');
        e.preventDefault(); 
        var formData = $(this).serialize();        
        $.ajax({
            type: 'POST',
            url: '/CreateData', 
            data: formData,                     
            success: function(data){                       
                var result = data.result
                if (result == 1) {
                    table.ajax.reload()
                    $("#load_spinner").removeClass('flex')
                    $("#load_spinner").addClass('hidden')
                    // $(".hidden_msg").addClass('hidden');  
                    alert(data.msg)                  
                } else {
                    $("#load_spinner").removeClass('flex')
                    $("#load_spinner").addClass('hidden') 
                    alert(data.msg)
                }
            },
            error: function(xhr, status, error){        
                alert(`Ups hemos tenido un error por favor comunicarse con el desarrollador ${error}`)
                // let errors  = xhr.responseJSON.errors;  
                // $("#load_spinner").addClass('hidden')                
                // if (errors.Circuito) {
                //     $("#msg_error_circuito").removeClass('hidden')
                //     $("#msg_error_circuito").text(errors.Circuito)           
                // } else {
                //     $("#msg_error_circuito").addClass('hidden')
                //     $("#msg_error_circuito").text('')
                // }

                // if (errors.Sm_Av) {                    
                //     $("#msg_error_sm_av").removeClass('hidden')
                //     $("#msg_error_sm_av").text(errors.Sm_Av)            
                // } else {
                //     $("#msg_error_sm_av").addClass('hidden')
                //     $("#msg_error_sm_av").text('')  
                // }      
            }
        });
    }

    /* ACTULIZA UN REGISTRO YA EXISTENTE */
    function Update (e) {
        $("#load_spinner").removeClass('hidden')
        $("#load_spinner").addClass('flex')
        e.preventDefault();        
        var formData = $(this).serialize();        
        $.ajax({
            type: 'POST',
            url: '/UpdateData', 
            data: formData,                     
            success: function(data){                       
                var result = data.result
                if (result == 1) {                    
                    table.ajax.reload()
                    $("#load_spinner").removeClass('flex')
                    $("#load_spinner").addClass('hidden')
                    alert(data.msg)
                } else {
                    $("#load_spinner").removeClass('flex')
                    $("#load_spinner").addClass('hidden')                    
                    alert(data.msg)                    
                }
            },
            error: function(xhr, status, error){                        
                console.error(error)                   
            }
        });
    }

    /* CIERRA EL CENSO */
    function Close () {
        if(!confirm('quieres cerrar el censo')) {
            console.log('false')
        } else {
            console.log('true')
        }            
    }

    /* MUESTRA EL MENU */
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
        // timeout: 5000,
        maximumAge: 0,
    };
    
    function success(pos) {
        const crd = pos.coords;        
        latitud =  crd.latitude
        longitud =  crd.longitude

        $("#Latitud").val(crd.latitude)
        $("#Longitud").val(crd.longitude)            
    };

    function error(err) {
        console.warn(`ERROR(${err.code}): ${err.message}`);
    };

    setInterval(CheckInternet, 5000);

    /* ejemplo por si el usuario no tiene internet */
    function CheckInternet() {        
        if (!navigator.onLine) {                   
            /* obtiene la ubicacion actual del usuario */
            navigator.geolocation.getCurrentPosition(success, error, options);

            $("#form-data-offline").on('submit',  function () {                
                // let csrf_token = $('#form-data input[name="_token"]').val();
                let sm_av = $("#Sm_Av").val()
                let latitud = $("#Latitud").val()
                let longitud = $("#Longitud").val()
                let posicion =  $("#Posicion").val()
                let rpu =  $("#RPU").val()
                let municipalizado = $("#Municipalizado").val()
                let id_medida = $("#Id_medida_fk").val()
                let Id_transformador = $("#Id_transformador_fk").val()
                let Circuito = $("#Circuito").val()
                let num_medidor = $("#NumMedidor").val()
                let luminarias = $("#Luminarias").val()
                let id_estatus = $("#Id_estatus_fk").val()
                let id_lampara = $("#Id_lampara_fk").val()
                let id_tipo_luminaria = $("#id_tipoLuminaria_fk").val()
                let id_potencia = $("#Id_potencia_fk").val()
                let etiqueta = $("#Etiqueta").val()
                let id_potencia_fk = $("#Id_poste_fk").val()
                let dependencia = $("#Id_dependencia_fk").val()
                let id_altura =  $("#Id_altura_fk").val()
                let observaciones = $("#Observaciones").val() 

                a_data.push({                
                    'Sm_Av': sm_av,
                    'Latitud': latitud,
                    'Longitud': longitud,
                    'Posicion': posicion,
                    'RPU': rpu,
                    'Municipalizado': municipalizado,
                    'Id_medida_fk': id_medida,
                    'Id_transformador_fk': Id_transformador,
                    'Circuito': Circuito,
                    'NumMedidor': num_medidor,
                    'Luminarias': luminarias,
                    'Id_estatus_fk': id_estatus,
                    'Id_lampara_fk': id_lampara,
                    'id_tipoLuminaria_fk': id_tipo_luminaria,
                    'Id_potencia_fk': id_potencia,
                    'Etiqueta': etiqueta,
                    'Id_poste_fk': id_potencia_fk,
                    'Id_dependencia_fk': dependencia,
                    'Id_altura_fk': id_altura,
                    'Observaciones': observaciones,                    
                });                
                localStorage.setItem('a_data', JSON.stringify(a_data));
            });

        } else {
    
            navigator.geolocation.getCurrentPosition(success, error, options);

            let a_data_add = JSON.parse(localStorage.getItem('a_data'));
            if (a_data_add !== null) {                
                alert("Desea enviar los datos que esta guardados")                                                                                
                Create(a_data_add);
            }

            function Create (a_data_add) {
                $("#load_spinner").removeClass('hidden');
                $("#load_spinner").addClass('flex');                                
                $.ajax({
                    type: 'GET',
                    url: '/AddData',
                    // data: a_data_add,
                    data:{ data: a_data_add },
                    success: function(data){                       
                        var result = data.result
                        if (result == 1) {
                            $("#load_spinner").removeClass('flex')
                            $("#load_spinner").addClass('hidden')
                            // $(".hidden_msg").addClass('hidden');
                            localStorage.clear();
                            alert(`success  ${data.msg}`)
                            localStorage.clear();                            
                        } else {
                            $("#load_spinner").removeClass('flex')
                            $("#load_spinner").addClass('hidden')
                            alert(`error  ${data.msg}`)
                            // localStorage.clear();
                        }
                    },
                    error: function(xhr, status, error){                            
                        alert(`error http ${error}`)
                        $("#load_spinner").removeClass('flex')
                        $("#load_spinner").addClass('hidden')
                    }
                });  
            }      
        }
    }
});