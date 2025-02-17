//Funcion obtener los datos del producto al ingresar el codigo de barras
document.getElementById('codProducto').addEventListener('input', function()  {

    const codProductoInput = document.getElementById('codProducto');
    const precioInput = document.getElementById('precioProducto');
    const cantSalInput = document.getElementById('cantSal');
    const precioVentaInput = document.getElementById('precioVenta');
    const inputFechaSalida = document.getElementById("fechaSal");

    // Obtén el valor del input
    const codigoBarras = document.getElementById('codProducto').value; 

    //imprime el valor de codproducto
    //console.log('valor codProducto: ', + codigoBarras)

    if (codigoBarras) {
        fetch('./utils/obtenerPrecioProducto.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            // Envía el código de barras al servidor
            body: 'codigo_barras=' + encodeURIComponent(codigoBarras)  
        })

        // Conviértelo a un objeto JSON
        .then(response => response.json())  
        .then(data => {

        // Aquí puedes manipular los datos devueltos por PHP
        //console.log(data);

        if (data.success) {

               // Verifica que data.producto esté disponible y tenga CodProducto y PrecioVenta
            if (data.producto && data.producto.CodProducto && data.producto.PrecioVenta) {

                // Muestra los datos del producto
                //alert('Producto encontrado: Código ' + data.producto.CodProducto + ', Precio: $' + data.producto.PrecioVenta);

                //Precio del Producto encontrado, lo mostramos en los campo del formulario
                precioInput.value = data.producto.PrecioVenta;

                agregarFechaActual();

                ventaTotal();

            } else {

                alert('Datos del producto no disponibles.');

            }

        } else {

            alert('No se encontró el producto.');

        }
        })
        .catch(error => console.error('Error:', error));
    } else {

        alert('Por favor, ingresa un código de barras.');

        // Si el código está vacío, limpiar todos los campos relacionados
        codProductoInput.value = '';
        precioProducto.value = '';
        cantSalInput.value = '';
        precioVentaInput.value = '';
        inputFechaSalida.value = '';

    }

});

//Funcion para Calcular el precio de la venta al digitar la cantidad
document.getElementById('cantSal').addEventListener('input', function() {

    ventaTotal();

});


    function ventaTotal() {

        const precioVentaInput = document.getElementById('precioVenta');

        // Obtén el valor del input
        const cantSalInput = document.getElementById('cantSal').value;

        //Obtiene el valor del precio producto
        const precioInput = document.getElementById('precioProducto').value;

        //imprime el valor de cantidad salida 
        //console.log('valor cantidad salida Producto: ', + cantSalInput)

        //imprime el valor de cantidad salida 
        //console.log('valor Producto: ', + precioInput)
    
            //verifica los valores que sean numericos para poder realizar opreciones
            if (!isNaN(precioInput) && !isNaN(cantSalInput) && cantSalInput > 0) {

                const precioVenta = precioInput * cantSalInput;

                precioVentaInput.value = precioVenta.toLocaleString();

            } else {

                precioVentaInput.value = '';

            }

    }


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