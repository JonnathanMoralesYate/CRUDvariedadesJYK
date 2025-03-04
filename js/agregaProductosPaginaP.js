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
                <div class="card mx-auto" style="width: 14rem;">
                    <img src="photo/${productos.Foto}" class="img-fluid mx-auto rounded" alt="${productos.Nombre}">
                    <div class="card-body">
                        <h5 class="card-title">${productos.Nombre}</h5>
                        <p class="card-text">${productos.Descripción}</p>
                    </div>
                </div>
            </div>
        `;

        // Agregamos el producto al contenedor
        contenedor.innerHTML += productoHTML;
    });
}