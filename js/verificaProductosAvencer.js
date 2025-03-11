//Funcion que alerta Productos Proximos a vencer
async function ProductosproximosAvencer() {

    try {
        const response = await fetch('index.php?action=productosProximosAvencer', {
        method: "GET",
        headers: { "Content-Type": "application/json" },
        });

            const data = await response.json();
            //console.log("datos recibidos: ", data)

                // Verificamos que la respuesta tenga la clave correcta y datos
                if (data.success && Array.isArray(data.proximosAvencer) && data.proximosAvencer.length > 0) {
                    let mensaje = "Los siguientes productos están próximos a vencer:\n";
                        data.proximosAvencer.forEach(producto => {
                            mensaje += `- ${producto.Nombre} ${producto.Marca} ${producto.Descripcion} ${producto.CantActual} Und (${producto.FechaVencimiento})\n`;
                        });
                    alert(mensaje);
                } else {
                    //console.log("No hay productos próximos a vencer.");
                }

    } catch (error) {
        console.error("Error al obtener los datos del producto:", error);
    }
}

// Llamar la función cuando cargue la página
document.addEventListener("DOMContentLoaded", ProductosproximosAvencer);
