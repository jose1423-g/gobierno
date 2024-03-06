// Datos
var datos = [
    { id: 23, nombre: 'Jose', codigo: 'sm10', boton: 'btn' },
    { id: 24, nombre: 'Jose1', codigo: 'sm10', boton: 'btn' },
    { id: 25, nombre: 'Jose2', codigo: 'sm10', boton: 'btn' },
    { id: 25, nombre: 'Jose3', codigo: 'sm10', boton: 'btn' },
    { id: 27, nombre: 'Jose4', codigo: 'sm10', boton: 'btn' },
    { id: 28, nombre: 'Jose5', codigo: 'sm10', boton: 'btn' },
    { id: 29, nombre: 'Jose6', codigo: 'sm10', boton: 'btn' },
    { id: 30, nombre: 'Jose7', codigo: 'sm10', boton: 'btn' },
];

// Función para ocultar el ID y manejar el clic del botón
function configurarTabla() {
    var tabla = document.getElementById('miTabla');
    var tbody = tabla.querySelector('tbody');

    datos.forEach(function(fila) {
        var nuevaFila = document.createElement('tr');

        // nuevaFila += '<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">'
        
        // Oculta el ID en la primera celda        
        nuevaFila.innerHTML += '<td style="display: none;">' + fila.id + '</td>';
        
        // Agrega otras celdas
        nuevaFila.innerHTML += '<td class="px-6 py-4">' + fila.nombre + '</td>';
        nuevaFila.innerHTML += '<td class="px-6 py-4">' + fila.codigo + '</td>';
        nuevaFila.innerHTML += '<td class="px-6 py-4">' + fila.boton + '</td>';


        // nuevaFila.classList.add('bg-white','border-b');
        // Agrega la fila al tbody
        tbody.appendChild(nuevaFila);

        // Agrega un evento de clic al botón en cada fila
        var boton = nuevaFila.querySelector('td:last-child');
        boton.addEventListener('click', function() {
            // Obtiene el ID de la fila al hacer clic
            var id = fila.id;
            alert('ID: ' + id);
        });
    });
}

// Configura la tabla al cargar la página
configurarTabla();

// También puedes configurar la tabla al hacer clic en un botón, etc.
// document.getElementById('configurarTablaBtn').addEventListener('click', configurarTabla);

