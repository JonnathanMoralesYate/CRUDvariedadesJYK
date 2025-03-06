//Funcion traer la informacion del producto segun clase

async function obtenerInforProductoPorClase(idClase) {

    try {
        const response = await fetch(
        "index.php?action=productosPorClase",
        {
        method: "POST",
        headers: {
        "Content-Type": "application/json",
        },
        body: JSON.stringify({ idClase: idClase }), // Enviar datos al servidor como JSON
        });

        const data = await response.json();
        //console.log('Datos recibidos:', data);

            if (data.success) {

                    const producto = data.inforProducto;
                    //console.log('productos' , producto);

                    mostrarProductos(producto);
        } 

    } catch (error) {
    console.error('Error al obtener los datos del producto:', error);
    }
}


//Funcion para imprimir los productos por clase

function mostrarProductos(producto) {
    
    // Seleccionamos el contenedor donde se mostrarán los productos
    const contenedor = document.getElementById("productos-container");

    // Limpiamos el contenedor antes de agregar nuevos elementos
    contenedor.innerHTML = "";

    // Generamos el HTML para cada producto
    producto.forEach(productos => {
        const productoHTML = `
            <div class="col">
                <div class="card mx-auto h-100" style="width: 14rem;">
                    <img src="photo/${productos.Foto}" class="card-img-top rounded" alt="${productos.Producto}">
                    <div class="card-body">
                        <h5 class="card-title">${productos.Producto}</h5>
                        <p class="card-text">${productos.Descripcion}</p>
                    </div>
                </div>
            </div>
        `;

        // Agregamos el producto al contenedor
        contenedor.innerHTML += productoHTML;
    });
}

//========================================================================================================================================

//Funcion traer los Productos Mas Vendidos en pagina principal
    async function ProductosMayorVenta() {

        //alert('ingresa a la funcion actualizargraficamayoeventa');

        try {
            const response = await fetch('index.php?action=productosMayorVentaP', {
            method: "GET",
            headers: { "Content-Type": "application/json" },
        });

            // Verificar el contenido de la respuesta antes de procesarla como JSON
            //const textResponse = await response.text();
            //console.log("Respuesta recibida:", textResponse);

            const data = await response.json();
            //console.log('Datos recibidos:', data); // Verifica qué datos llegan

            const producto = data.mayoresVenta;

            mostrarProductosMayorVenta(producto);



      //console.log("");
        } catch (error) {
            console.error("Error al obtener los datos del producto:", error);
        }
    }


 //Funcion para mostrar en pagina principal los productos de mayor venta

function mostrarProductosMayorVenta(producto) {
    
    // Seleccionamos el contenedor donde se mostrarán los productos
    const contenedor = document.getElementById("productos-container");

    // Limpiamos el contenedor antes de agregar nuevos elementos
    contenedor.innerHTML = "";

    // Generamos el HTML para cada producto
    producto.forEach(productos => {
        const productoHTML = `
            <div class="col">
                <div class="card mx-auto h-100" style="width: 14rem;">
                    <img src="photo/${productos.Foto}" class="card-img-top rounded" alt="${productos.Producto}">
                    <div class="card-body">
                        <h5 class="card-title">${productos.Producto}</h5>
                        <p class="card-text">${productos.Descripcion}</p>
                    </div>
                </div>
            </div>
        `;

        // Agregamos el producto al contenedor
        contenedor.innerHTML += productoHTML;
    });
}

// Llamar la función cuando cargue la página
document.addEventListener("DOMContentLoaded", ProductosMayorVenta);