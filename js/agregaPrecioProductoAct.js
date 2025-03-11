document.addEventListener('DOMContentLoaded', async function() {

    const precioProducto = document.getElementById("precioProducto");

    //const codProducto = document.getElementById("codProducto"); Guarda la referencia del input en la variable codProducto. Ahora codProducto es un objeto que representa el <input>.
    const codProducto = document.getElementById("codProducto");
    //codProducto.value obtiene el contenido que tiene el input al momento de la ejecución.
    //console.log("Valor actual:", codProducto.value);

    try {
        const response = await fetch(
            "index.php?action=verificacionCodigoProductos",
            {
            method: "POST",
            headers: {
            "Content-Type": "application/json",
            },
            body: JSON.stringify({ codProducto: codProducto.value}), // Enviar datos al servidor como JSON
            }
        );

        const data = await response.json();
        //console.log('Datos recibidos:', data);

            if (data.success) {

                if(data.producto && data.producto.PrecioVenta) { 
                    //Precio del Producto encontrado, lo mostramos en los campo del formulario
                    precioProducto.value = data.producto.PrecioVenta.toLocaleString();

                }else {
                    alert('Datos del Producto no Disponibles.');
                }

            } else {
                //document.getElementById("precioProducto").value = "";
            }
    } catch (error) {
        console.error("Error al obtener la información del producto:", error);
    }

});

document.addEventListener("DOMContentLoaded", function () {
    const precioVenta = document.getElementById("precioVenta");
    const cantSalidaInput = document.querySelector("input[name='cantSal']");
    const precioProductoInput = document.getElementById("precioProducto");

    // Escuchar cambios en la cantidad de salida
    cantSalidaInput.addEventListener("change", function () {
        
        // Convertir valores a número correctamente
        const cantSalida = parseFloat(cantSalidaInput.value.replace(",", ".")) || 0;
        const precioProducto = parseFloat(precioProductoInput.value.replace(",", ".")) || 0;

        console.log("Cantidad de Salida:", cantSalida);
        console.log("Precio Producto:", precioProducto);

        // Calcular el precio de venta
        const precioVentaOpe = cantSalida * precioProducto;

        // Mostrar el resultado correctamente sin formato de comas
        precioVenta.value = Math.floor(precioVentaOpe);
    });
});

