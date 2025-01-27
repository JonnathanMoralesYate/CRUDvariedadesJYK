//Funcion obtener los datos del producto al ingresar el codigo de barras
document.addEventListener('input', function()  {

    const codProductoInput = document.getElementById('codProducto');
    const precioInput = document.getElementById('precioProducto');
    const cantSalInput = document.getElementById('cantSal');
    const precioVentaInput = document.getElementById('precioVenta');

    // Obtén el valor del input
    const codigoBarras = document.getElementById('codProducto').value; 

    //imprime el valor de codproducto
    console.log('valor codProducto: ', + codigoBarras)

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

    }

});

//Funcion para Calcular el precio de la venta al digitar la cantidad
document.addEventListener('input', function() {

    ventaTotal();

});


function ventaTotal() {

    const precioVentaInput = document.getElementById('precioVenta');

    // Obtén el valor del input
    const cantSalInput = document.getElementById('cantSal').value;

    //Obtiene el valor del precio producto
    const precioInput = document.getElementById('precioProducto').value;

    //imprime el valor de cantidad salida 
    console.log('valor cantidad salida Producto: ', + cantSalInput)

    //imprime el valor de cantidad salida 
    console.log('valor Producto: ', + precioInput)
    
    //verifica los valores que sean numericos para poder realizar opreciones
    if (!isNaN(precioInput) && !isNaN(cantSalInput) && cantSalInput > 0) {

        const precioVenta = precioInput * cantSalInput;

        precioVentaInput.value = precioVenta.toFixed(2);

    } else {

        precioVentaInput.value = '';

    }

}