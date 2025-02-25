
// Funcion obtener los datos del producto al ingresar el código de barras
document.getElementById('codProductoS').addEventListener('input', async function () {
    
    // Obtener el código de barras
    const codigoBarras = document.getElementById('codProductoS').value;

    // Llamamos a la función para obtener el id del producto, el resultado es un string
    const idProducto = await obtenerIdProducto(codigoBarras);
    //alert(idProducto);

    //Funcion que verifica si el producto tiene existencias en inventario para la venta, , el resultado es un string
    const cantidadActual = await  existenciaInventario(idProducto);
    //alert(cantidadActual);

    //Convertimos el resultado en numero
    const CantActual = parseFloat(cantidadActual);

    // Imprimir el tipo y el valor real de 'numero'
    //console.log("Valor de 'numero':", CantActual);
    //console.log("Tipo de 'numero':", typeof CantActual);

        //Al convertirlo no es un numero  el valor "NaN"
        if (isNaN(CantActual)) {

            alert("Realice el registro de entrada del producto");
            // Limpiar el campo de código de barras después de agregar el producto
            document.getElementById('codProductoS').value = '';

        } else {

            if (CantActual > 0) {

                obtenerInforProducto(idProducto, CantActual);

            }else if(CantActual < 1){

                alert("Producto sin stock disponible o agotado");
                // Limpiar el campo de código de barras después de agregar el producto
                document.getElementById('codProductoS').value = '';
            } 
        }

});

    //Funcion traer la informacion del producto
    function obtenerInforProducto(idProducto, CantActual) {

        if (idProducto) {
            // Hacer la solicitud al servidor para obtener los datos del producto
            fetch('./utils/inforProducto.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'idProducto=' + encodeURIComponent(idProducto)
            })
        
            .then(response => response.json())
            .then(data => {
                if (data.success) {

                    const producto = data.producto;

                    agregarProductoATabla(producto, CantActual);  // Función para agregar el producto a la tabla

                } 
            
            })
            .catch(error => {
                console.error('Error al obtener los datos del producto:', error);
            });
        }
    }

// Función para agregar el producto a la tabla
function agregarProductoATabla(producto, CantActual) {

    const tabla = document.getElementById('productTableBody');

    let productoExistente = false;

    // Verificar si el producto ya está en la tabla
for (let i = 0; i < tabla.rows.length; i++) {
    const fila = tabla.rows[i];
    const codigoProductoEnTabla = fila.cells[1].textContent; // Columna de código

    if (codigoProductoEnTabla === producto.CodProducto) {
        // Si el producto ya existe, actualizar la cantidad
        const cantidadInput = fila.cells[5].querySelector('input');

        // Verificar si la cantidad actual es menor que la cantidad máxima
        if (parseInt(cantidadInput.value) < CantActual) {

            // Aumentar la cantidad
            cantidadInput.value = parseInt(cantidadInput.value) + 1;

            // Actualizar total de esa fila
            actualizarTotal(fila, producto.PrecioVenta, cantidadInput.value);
            productoExistente = true;

            // Limpiar el campo de código de barras después de agregar el producto
            document.getElementById('codProductoS').value = '';
            break;

        } else {

            // Si ya no se puede agregar más, mostrar el mensaje de error
            alert("No se puede agregar más productos, se agotó el producto");
            
            // Limpiar el campo de código de barras después de intentar agregar el producto
            document.getElementById('codProductoS').value = '';
            productoExistente = true;
            break;

        }
    }
}

    // Si el producto no existe, agregarlo a la tabla
    if (!productoExistente) {
        // Crear una nueva fila
        const fila = document.createElement('tr');
        
        // Crear celdas para la fila
        const itemCell = document.createElement('td');
        const codigoCell = document.createElement('td');
        const nombreCell = document.createElement('td');
        const contenidoCell = document.createElement('td');
        const precioCell = document.createElement('td');
        const cantidadCell = document.createElement('td');
        const totalCell = document.createElement('td');
        const accionCell = document.createElement('td');

        // Asignar valores a las celdas
        itemCell.textContent = tabla.rows.length + 1;  // Número de item
        codigoCell.textContent = producto.CodProducto;
        nombreCell.textContent = producto.Producto;
        contenidoCell.textContent = producto.Contenido;
        precioCell.textContent = `$${producto.PrecioVenta.toLocaleString()}`;
        
        // Input de cantidad
        const cantidadInput = document.createElement('input');
        cantidadInput.type = 'number';
        cantidadInput.value = 1;
        cantidadInput.min = 1;
        cantidadInput.max = CantActual;
        cantidadInput.addEventListener('input', function () {
            actualizarTotal(fila, producto.PrecioVenta, cantidadInput.value);
        });
        cantidadCell.appendChild(cantidadInput);

        // Total calculado
        totalCell.textContent = `$${producto.PrecioVenta.toLocaleString()}`;

        // Botón para quitar el producto
        const quitarBtn = document.createElement('button');
        quitarBtn.textContent = 'Quitar';
        quitarBtn.className = 'btn btn-outline-secondary';
        quitarBtn.addEventListener('click', function () {
            fila.remove();
            actualizarTotalVenta();
        });

        accionCell.appendChild(quitarBtn);

        // Agregar todas las celdas a la fila
        fila.appendChild(itemCell);
        fila.appendChild(codigoCell);
        fila.appendChild(nombreCell);
        fila.appendChild(contenidoCell);
        fila.appendChild(precioCell);
        fila.appendChild(cantidadCell);
        fila.appendChild(totalCell);
        fila.appendChild(accionCell);

        // Agregar la fila a la tabla
        tabla.appendChild(fila);

        // Limpiar el campo de código de barras después de agregar el producto
        document.getElementById('codProductoS').value = '';
    }

    // Actualizar el total de la venta
    actualizarTotalVenta();
}

// Función para actualizar el total de una fila
function actualizarTotal(fila, precioUnitario, cantidad) {
    const totalCell = fila.cells[6];
    const total = precioUnitario * cantidad;
    totalCell.textContent = `$${total.toLocaleString()}`;
    actualizarTotalVenta();
}

// Función para actualizar el total de la venta
function actualizarTotalVenta() {
    const filas = document.querySelectorAll('#productTableBody tr');
    let totalVenta = 0;
    filas.forEach(fila => {
        const totalCell = fila.cells[6];
        const total = parseFloat(totalCell.textContent.replace('$', '').replace('.', '')) || 0;
        totalVenta += total;
    });
    document.getElementById('totalVenta').textContent = `$${totalVenta.toLocaleString()}`;
}



//evento para registrar datos de salida productos
document.getElementById('registrarSalida').addEventListener('click', async function() {

    // Selecciona todas las filas dentro de <tbody>
    const filas = document.querySelectorAll('#productTableBody tr'); 

    // Creamos un array para almacenar la información extraída
    let datosSalida = [];

    // Obtener los valores de los inputs fijos (fuera de la tabla)
    const cliente = document.getElementById('numIdentCliente').value;

    // Llamamos a la función para obtener el id del cliente
    const clienteId = await obtenerIdCliente(cliente);  
    //alert("idCliente." + clienteId);

    //Convertimos el resultado en numero
    const idCliente = parseFloat(clienteId);

    if (isNaN(idCliente)) {
        alert('Dato del Cliente Invalidos (null).');
        return;
    }

    const fechaSal = document.getElementById('fechaSal').value; 
    const formaPago = document.getElementById('tipoPago').value; 

    // Validación de datos fijos (cliente, fecha y forma de pago)
    if (!cliente || !fechaSal || !formaPago) {
        alert("Por favor, complete todos los campos antes de registrar.");
        return; // Si falta algún dato, no se envían los datos
    }

    // Iteramos sobre las filas de la tabla
    for (let fila of filas) {
        // Obtén todas las celdas de la fila
        const celdas = fila.getElementsByTagName('td'); 
        
        // Verifica que hay celdas en la fila
        if (celdas.length > 0) {

            const codProducto = celdas[1].innerText.trim();
            
            // Llamamos a la función para obtener el id del producto
            const idProducto = await obtenerIdProducto(codProducto);  
            //alert("idProducto." + idProducto);

            // Accedemos al valor del input dentro de la celda de "Cantidad"
            const cantidadInput = celdas[5].querySelector('input');  // Asumimos que el input está dentro de la celda 5
            const cantidad = cantidadInput ? cantidadInput.value : '';  // Extraemos el valor del input

            // Si la cantidad está vacía o es 0, no se debe registrar este producto
            if (!cantidad || cantidad <= 0) {
                alert("Por favor, ingrese una cantidad válida para cada producto.");
                return;
            }

            // Total, lo tomamos de la celda correspondiente
            const total = celdas[6].innerText.trim();
            const precio = parseInt(total.replace('$', '').replace('.', ''), 10);  // Convertimos el valor de precio a número

            // Verificamos que el total también esté disponible
            if (!total || total <= 0) {
                alert("El total no es válido.");
                return;
            }

            // Agregamos la información de la fila al array de datos
            datosSalida.push({
                idProducto,          
                idCliente,
                fechaSal,
                cantidad,        
                precio,           
                formaPago,  
            });
        }
    }

    // Si no hay productos en la tabla, mostrar alerta
    if (datosSalida.length === 0) {
        alert("No hay productos para registrar.");
        return;
    }

    // Mostrar los datos en la consola o lo que desees hacer con ellos
    console.log('Datos a enviar:', datosSalida);

    registroSalProductos(datosSalida);

    
});


    //Funcion para registrar salida de productos
    function registroSalProductos(datosSalida) {

        if(datosSalida) {

            // Enviar los datos al servidor usando AJAX (fetch)
            fetch('./utils/registrarSalidasProductos.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(datosSalida)
                })

                .then(response => response.text())  // Cambié a 'text()' para obtener la respuesta en formato texto
                .then(text => {
                console.log('Respuesta del servidor:', text);  // Imprime la respuesta que entrega el servidor

            try {

                const data = JSON.parse(text);  // Intenta convertir a JSON
                console.log('Datos enviados registrar salida productos correctamente:', data);
                //alert('Los datos se han registrado correctamente.');

                //Funcion para actualizar inventario con respecto de salidas del producto
                actualizarInventario(datosSalida);

            } catch (error) {

            console.error('Error al convertir la respuesta:', error);
            alert('Hubo un error al registrar los datos. La respuesta del servidor no es válida.');

            }
            })
            .catch(error => {

                console.error('Error al enviar los datos:', error);
                alert('Hubo un error al registrar los datos. Inténtalo nuevamente.');

            });

        }else{

        }

    }



    //Funcion asincrona para actualizar inventario
    function actualizarInventario(datosSalida) {

        if(datosSalida) {

            // Enviar los datos al servidor usando AJAX (fetch)
            fetch('./utils/actualizarInventario.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(datosSalida)
                })

                .then(response => response.text())  // Cambié a 'text()' para obtener la respuesta en formato texto
                .then(text => {
                console.log('Respuesta del servidor:', text);  // Imprime la respuesta

            try {

                const data = JSON.parse(text);  // Intenta convertir a JSON
                console.log('Datos enviados actualizar inventario correctamente:', data);
                //alert('Se ha Actualizado el inventario correctamente.');

                //Funcion para actualizar puntos con respecto de salidas del producto
                actualizarPuntosCliente(datosSalida);

            } catch (error) {

            console.error('Error al convertir la respuesta:', error);
            alert('Hubo un error al actualizar los datos. La respuesta del servidor no es válida.');

            }
            })
            .catch(error => {

                console.error('Error al enviar los datos:', error);
                alert('Hubo un error al actualizar los datos. Inténtalo nuevamente.');

            });

        }else{

        }

        
    }


    //Funcion asincrona para actualizar inventario
    function actualizarPuntosCliente(datosSalida) {

        if(datosSalida) {

            // Enviar los datos al servidor usando AJAX (fetch)
            fetch('./utils/actualizarPuntosCliente.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(datosSalida)
                })

                .then(response => response.text())  // Cambié a 'text()' para obtener la respuesta en formato texto
                .then(text => {
                console.log('Respuesta del servidor:', text);  // Imprime la respuesta

            try {

                const data = JSON.parse(text);  // Intenta convertir a JSON
                console.log('Datos enviados actualizar punto clientes correctamente:', data);
                //alert('Se ha Actualizado puntos del cliente correctamente.');

                //mensaje proceso terminado y borrar datos de tabla o actualizar pagina ??
                alert('Se ha Registardo con exito los Productos');
                // Recargar la página
                location.reload();

            } catch (error) {

            console.error('Error al convertir la respuesta:', error);
            alert('Hubo un error al actualizar los datos. La respuesta del servidor no es válida.');

            }
            })
            .catch(error => {

                console.error('Error al enviar los datos:', error);
                alert('Hubo un error al actualizar los datos. Inténtalo nuevamente.');

            });

        }else{

        }

        
    }



    // Función asincrónica para obtener el idProducto
    async function obtenerIdProducto(codProducto) {

        if (codProducto) {

        try {
            const response = await fetch('./utils/obtenerIdProducto.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                // Envía el código de barras al servidor
                body: 'codProducto=' + encodeURIComponent(codProducto)  
            });

            // Conviértelo a un objeto JSON
            const data = await response.json();
    
            if (data.success) {

                // Verifica que data.producto esté disponible y tenga idProducto
                if (data.producto && data.producto.idProducto) {

                    return data.producto.idProducto;

                } else {
                    alert('Datos del producto no disponibles.');
                    return null;
                }
            } else {
                alert('No se encontró el producto.');
                return null;
            }
            } catch (error) {
                console.error('Error al obtener el id del producto:', error);
                return null;
            }
        }
        return null;
    }



    // Función asincrónica para obtener el idProducto
    async function obtenerIdCliente(cliente) {

        if (cliente) {

        try {
            const response = await fetch('./utils/obtenerIdCliente.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                // Envía el código de barras al servidor
                body: 'cliente=' + encodeURIComponent(cliente)  
            });

            // Conviértelo a un objeto JSON
            const data = await response.json();
    
            if (data.success) {

                // Verifica que data.cliente esté disponible y tenga idCliente
                if (data.cliente && data.cliente.idCliente) {
                    
                    return data.cliente.idCliente;

                } else {
                    alert('Datos del Cliente no disponibles.');
                    return null;
                }
            } else {
                //alert(' Cliente no registrado.');
                return null;
            }
        } catch (error) {
            console.error('Error al obtener el id del Cliente:', error);
            return null;
        }
        }
        return null;
    }


    //Funcion al ingresar identificacion del cliente agrege la fecha actual automaticamente
    document.getElementById('numIdentCliente').addEventListener('input', async function()  {

    // Obtener los valores de los inputs fijos (fuera de la tabla)
    const cliente = document.getElementById('numIdentCliente').value;

    if (cliente === "") {

        return; // Evita consultas si el campo está vacío
    }

    // Llamamos a la función para obtener el id del cliente
    const clienteId = await obtenerIdCliente(cliente);  
    //alert("idCliente." + clienteId);

    //si el cliente no esta registrado, manejar o mejorar los demas errorres tanto de la consulta y fetch

    //Convertimos el resultado en numero
    const idCliente = parseFloat(clienteId);

    if (isNaN(idCliente)) {

        alert(' Cliente no registrado, realice el registro.');

        // Limpiar el campo de cliente y fecha de salida despues cuando el cliente no esta registrado
        document.getElementById('numIdentCliente').value = '';
        document.getElementById("fechaSal").value = '';

        return;

    }else{

        agregarFechaActual();

    }

    });


    //Funcion para agregar la fecha actual de salida del producto
    function agregarFechaActual() {

        const inputFechaSalida = document.getElementById("fechaSal");

        // Obtener la fecha y hora actual
        const fechaHoraActual = new Date();

        // Obtener el año, mes, día, hora, minutos y formatearlos, // Los meses en JavaScript son de 0 a 11
        const anio = fechaHoraActual.getFullYear();
        const mes = String(fechaHoraActual.getMonth() + 1).padStart(2, '0'); 
        const dia = String(fechaHoraActual.getDate()).padStart(2, '0');
        const hora = String(fechaHoraActual.getHours()).padStart(2, '0');
        const minutos = String(fechaHoraActual.getMinutes()).padStart(2, '0');

        // Formatear la fecha y hora en el formato requerido (YYYY-MM-DDTHH:MM)
        const fechaHoraFormateada = `${anio}-${mes}-${dia}T${hora}:${minutos}`;

        // Asignar la fecha y hora formateada al input
        inputFechaSalida.value = fechaHoraFormateada;

    }


    // Función asincrónica para obtener verificar que el producto este en inventario y existencia para la venta
    async function existenciaInventario(idProducto) {
        if (idProducto) {
            try {
                // Hacer la solicitud al servidor para obtener los datos del producto
                const response = await fetch('./utils/verificarProductoInventario.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'idProducto=' + encodeURIComponent(idProducto)
                });
    
                // Verificamos si la respuesta fue exitosa
                if (!response.ok) {
                    throw new Error('Error en la respuesta del servidor');
                }
    
                const data = await response.json();
    
                // Verificamos que data y data.cantidadActual y data.cantidadActual.CantActual estén definidos
                if (data && data.success && data.stock && data.stock.CantActual) {

                    const stock = data.stock.CantActual;
                    return stock;

                } else {
                    //alert('Producto no esta en inventario, realice la entrada del producto');
                    return false;
                }
            } catch (error) {
                console.error('Error al obtener los datos del producto:', error);
                alert('Hubo un error al obtener los datos del producto.');
            }
        }
    }