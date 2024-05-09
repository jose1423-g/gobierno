import $ from "jquery";
import 'flowbite';
import DataTable from 'datatables.net-dt';
import TomSelect from "tom-select";
import 'tom-select/dist/css/tom-select.css';
import 'datatables.net-dt/css/dataTables.dataTables.min.css';
import 'tom-select/dist/js/tom-select.complete'
$(document).ready(function () {

    let  id_medida_fk = document.getElementById("Id_medida_fk");
    let  id_lampara_fk = document.getElementById("Id_lampara_fk");
    let  Id_potencia_fk  = document.getElementById("Id_potencia_fk");
    let  Id_poste_fk = document.getElementById("Id_poste_fk");
    let  Id_dependencia_fk  = document.getElementById("Id_dependencia_fk");
    let  Id_altura_fk = document.getElementById("Id_altura_fk");
    let  Id_transformador_fk = document.getElementById("Id_transformador_fk");
    let  Id_estatus_fk = document.getElementById("Id_estatus_fk");
    let  id_tipoLuminaria_fk = document.getElementById("id_tipoLuminaria_fk");

    let id_medida;
    if (id_medida_fk) {
        id_medida = new TomSelect("#Id_medida_fk", {            
            create: true,        
            sortField: {
                field: "text",
                direction: "desc"
            }
        });    
    }
    let id_lampara;
    if (id_lampara_fk) {
        id_lampara = new TomSelect("#Id_lampara_fk", {
            create: true,        
            sortField: {
                field: "text",
                direction: "desc"
            }
        });    
    }
    let id_potencia;
    if (Id_potencia_fk) {
        id_potencia = new TomSelect("#Id_potencia_fk", {
            create: true,
            sortField: {
                field: "text",
                direction: "desc"
            }
        });    
    }
    let id_poste;
    if (Id_poste_fk) {
        id_poste = new TomSelect("#Id_poste_fk", {
            create: true,
            sortField: {
                field: "text",
                direction: "desc"
            }
        });    
    }
    let id_dependencia;
    if (Id_dependencia_fk) {
        id_dependencia = new TomSelect("#Id_dependencia_fk", {
            create: true,
            sortField: {
                field: "text",
                direction: "desc"
            }
        });    
    }
    let id_altura;
    if (Id_altura_fk) {
        id_altura = new TomSelect("#Id_altura_fk", {
            create: true,
            sortField: {
                field: "text",
                direction: "desc"
            }
        });    
    }
    let id_transformador;
    if (Id_transformador_fk) {
        id_transformador = new TomSelect("#Id_transformador_fk", {
            create: true,
            sortField: {
                field: "text",
                direction: "desc"
            }
        });    
    }
    let id_estatus;
    if (Id_estatus_fk) {
        id_estatus = new TomSelect("#Id_estatus_fk", {
            create: true,
            sortField: {
                field: "text",
                direction: "desc"
            }
        });    
    }

    let id_luminaria;
    if (id_tipoLuminaria_fk) {
        id_luminaria =  new TomSelect("#id_tipoLuminaria_fk", {
            create: true,
            sortField: {
                field: "text",
                direction: "desc"
            }
        });    
    }
 
    let btn_navbar = document.getElementById('btn-navbar');
    let content_menu = document.getElementById('navbar-default');
    let a_data = [];
    // let latitud = '';
    // let longitud = '';

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

    $("#form-data").on('submit',  Create);        
    $("#form_update").on('submit', Update); 

    /* CIERRAN EL MODAL CON EL ICON X*/
    $("#btn_close_modal").on('click', function () {        
        $("#Modal_static").addClass('hidden')
    })

    /* CIERRA EL MODAL CON EL BOTON CANCELAR */
    $("#btn_cancelar_modal").on('click',  function () {
        $("#Modal_static").addClass('hidden')
    })

    /* MUESTRA LOS DATOS DEL CONCETRADO PERMITE ACTUALIZAR */
    function ShowData(id) {
        $("#load_spinner").removeClass('hidden');
        $("#load_spinner").addClass('flex');
        $.ajax({
            type: 'GET',
            url: '/ShowData', 
            data:{
                id: id                        
            },                    
            success: function(data){  
                if (data) {                                                        
                    data.forEach(element => {
                        $("#Sm_Av").val(element.Sm_Av)
                        $("#Latitud").val(element.Latitud)
                        $("#Longitud").val(element.Longitud)                    
                        $("#Circuito").val(element.Circuito)
                        $("#NumMedidor").val(element.NumMedidor)
                        $("#Luminarias").val(element.Luminarias)
                        $("#Etiqueta").val(element.Etiqueta)                    
                        $("#Observaciones").val(element.Observaciones)

                        id_medida.addOption({value: element.Id_medida_fk, text: element.Id_medida_fk});                    
                        id_medida.setValue(element.Id_medida_fk);// Seleccionar la opción recién agregada
                        
                        id_transformador.addOption({value: element.Id_transformador_fk, text: element.Id_transformador_fk});
                        id_transformador.setValue(element.Id_transformador_fk);// Seleccionar la opción recién agregada
            
                        id_estatus.addOption({value: element.Id_estatus_fk, text: element.Id_estatus_fk});
                        id_estatus.setValue(element.Id_estatus_fk);// Seleccionar la opción recién agregada
                                            
                        id_lampara.addOption({value: element.Id_lampara_fk, text: element.Id_lampara_fk});
                        id_lampara.setValue(element.Id_lampara_fk);// Seleccionar la opción recién agregada
                        
                        id_potencia.addOption({value: element.Id_potencia_fk, text: element.Id_potencia_fk});
                        id_potencia.setValue(element.Id_potencia_fk);// Seleccionar la opción recién agregada
                        
                        id_poste.addOption({value: element.Id_poste_fk, text: element.Id_poste_fk});
                        id_poste.setValue(element.Id_poste_fk);// Seleccionar la opción recién agregada

                        id_dependencia.addOption({value: element.Id_dependencia_fk, text: element.Id_dependencia_fk});
                        id_dependencia.setValue(element.Id_dependencia_fk);// Seleccionar la opción recién agregada
                        
                        id_altura.addOption({value: element.Id_altura_fk, text: element.Id_altura_fk});
                        id_altura.setValue(element.Id_altura_fk);// Seleccionar la opción recién agregada

                        id_luminaria.addOption({value: element.Id_tipoLuminaria_fk, text: element.Id_tipoLuminaria_fk});
                        id_luminaria.setValue(element.Id_tipoLuminaria_fk); // Seleccionar la opción recién agregada                                       
                    });                
                    $("#load_spinner").removeClass('flex')
                    $("#load_spinner").addClass('hidden')
                } else {
                    $("#load_spinner").removeClass('flex')
                    $("#load_spinner").addClass('hidden')
                }
            },
            error: function(xhr, status, error){        
                console.error(error)                
            }
        });
    }
              
    /* CREA UN NUEVO CENSO */
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

    /* FUNCIONES PARA OBTENER, ACTULIZAR Y CREAR USUARIOS */
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
            "visible": false, // Establece esta columna como no visible
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
        $("#content-pass-confirm").addClass('hidden');
        $("#id_user").val(id);
        ShowUsers(id)    
    });
    $("#form_create_users").on('submit', CreateUser);

    /* MUESTRA EL MODAL PARA AGREGAR UN NUEVO USUARIO */
    $("#btn_show_modal_user").on('click', function () {
        $("#Modal_static_users").removeClass('hidden')
        $("#Modal_static_users").addClass('flex')
        $("#content-pass-confirm").removeClass('hidden');
        ClearFormUser();         
    })
    /* CIERRAN EL MODAL */
    $("#btn_close_modal_users").on('click', function () {        
        $("#Modal_static_users").addClass('hidden')
        ClearFormUser()
    })
    /* CIERRA EL MODAL CON EL BOTON CANCELAR  */
    $("#btn_cancelar_modal_users").on('click',  function () {
        $("#Modal_static_users").addClass('hidden')
        ClearFormUser()
    })

    function ClearFormUser() {
        $("#id_user").val('');
        $("#name").val('');
        $("#email").val('');
        $("#password").val('');
        $("#password_confirmation").val('');
        $("#EsAdmin").prop('checked', false);
    }

    function ShowUsers(id) {      
        $("#load_spinner").removeClass('hidden');
        $("#load_spinner").addClass('flex');          
        $.ajax({
            type: 'GET',
            url: '/ShowUsers', 
            data:{
                id: id                        
            },                    
            success: function(data){                
                if (data.name) {
                    $("#load_spinner").removeClass('flex')
                    $("#load_spinner").addClass('hidden')
                    $("#name").val(data.name)
                    $("#email").val(data.email)
                    $("#password").val(data.password)
                    if (data.EsAdmin) {
                        $("#EsAdmin").prop('checked', true);
                    } else {
                        $("#EsAdmin").prop('checked', false);
                    } 
                } else {
                    $("#load_spinner").removeClass('flex')
                    $("#load_spinner").addClass('hidden')
                }                                          
            },
            error: function(xhr, status, error){        
                console.error(error)                
            }
        });
    }

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
                    table_users.ajax.reload()
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

    /* MUESTRA EL MENU */
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
        // timeout: 5000,
        maximumAge: 0,
    };
    
    function success(pos) {
        const crd = pos.coords;        
        // latitud =  crd.latitude
        // longitud =  crd.longitude
        $("#Latitud").val(crd.latitude)
        $("#Longitud").val(crd.longitude)            
    };

    function error(err) {
        console.warn(`ERROR(${err.code}): ${err.message}`);
    };

    navigator.geolocation.getCurrentPosition(success, error, options);
    

    /* ejemplo por si el usuario no tiene internet */
    if (!navigator.onLine) {                   
        /* obtiene la ubicacion actual del usuario */
        navigator.geolocation.getCurrentPosition(success, error, options);

        $("#btn_save_data").on('click',  function () {                
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

            let datos = {                
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
                'Observaciones': observaciones
            }

            a_data.push(datos);

        });
        
        $("#btn_save_local").on('click', function () {                    
            alert("Datos guardados localmete correctamente")
            localStorage.setItem('a_data', JSON.stringify(a_data));        
            
        });

    } else {

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

});