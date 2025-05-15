// Variables globales para paginación (solo para productos por clase)
let productosPaginados = [];
const productosPorPagina = 9; // Ajusta la cantidad de productos por página
let paginaActual = 1;

//=====================================================================================================================

// Función traer la información del producto según clase (con paginación)
async function obtenerInforProductoPorClase(idClase) {
   // console.log('obtenerInforProductoPorClase llamado con idClase:', idClase);
    try {
        const response = await fetch(
            "index.php?action=productosPorClase",
            {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({ idClase: idClase }),
            }
        );

        const data = await response.json();

        if (data.success) {
            productosPaginados = data.inforProducto; // Guarda todos los productos
            //console.log('Productos obtenidos para paginar:', productosPaginados);
            mostrarPagina(1); // Muestra la primera página
        }
    } catch (error) {
        console.error('Error al obtener los datos del producto:', error);
    }
}

//=====================================================================================================================

// Función para imprimir los productos por clase (productosPagina es un subconjunto para la página actual)
function mostrarProductos(productosPagina) {
    const contenedor = document.getElementById("productos-container");
    contenedor.innerHTML = "";

    productosPagina.forEach(producto => {
        const productoHTML = `
            <div class="col">
                <div class="card mx-auto h-100" style="width: 14rem;">
                    <img src="photo/${producto.Foto}" class="card-img-top rounded" alt="${producto.Producto}">
                    <div class="card-body">
                        <h5 class="card-title">${producto.Producto}</h5>
                        <p class="card-text">${producto.Descripcion}</p>
                    </div>
                </div>
            </div>
        `;
        contenedor.innerHTML += productoHTML;
    });
}

//=====================================================================================================================

// Función traer los Productos Más Vendidos en página principal (NO CAMBIADO)
async function ProductosMayorVenta() {
    try {
        const response = await fetch('index.php?action=productosMayorVentaP', {
            method: "GET",
            headers: { "Content-Type": "application/json" },
        });

        const data = await response.json();

        const producto = data.mayoresVenta;

        mostrarProductosMayorVenta(producto);

    } catch (error) {
        console.error("Error al obtener los datos del producto:", error);
    }
}

// Función para mostrar en página principal los productos de mayor venta (NO CAMBIADO)
function mostrarProductosMayorVenta(producto) {
    const contenedor = document.getElementById("productos-container");
    contenedor.innerHTML = "";

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

        contenedor.innerHTML += productoHTML;
    });
}

// Llamar la función cuando cargue la página para mostrar productos más vendidos
document.addEventListener("DOMContentLoaded", ProductosMayorVenta);

//=====================================================================================================================

// Función para mostrar botones de paginación para productos por clase
function mostrarPaginacion() {
    const totalPaginas = Math.ceil(productosPaginados.length / productosPorPagina);
    const paginacionContenedor = document.getElementById("paginacion-container");
    paginacionContenedor.innerHTML = "";

    // Crear nav y ul con clases Bootstrap
    const nav = document.createElement("nav");
    const ul = document.createElement("ul");
    ul.className = "pagination justify-content-center flex-wrap mt-5";

    // --- Botón Anterior ---
    const liAnterior = document.createElement("li");
    liAnterior.className = "page-item " + (paginaActual <= 1 ? "disabled" : "");
    const aAnterior = document.createElement("a");
    aAnterior.className = "page-link";
    aAnterior.href = "#";
    aAnterior.textContent = "Anterior";
    aAnterior.addEventListener("click", (e) => {
        e.preventDefault();
        if (paginaActual > 1) mostrarPagina(paginaActual - 1);
    });
    liAnterior.appendChild(aAnterior);
    ul.appendChild(liAnterior);

    // --- Botones numéricos ---
    // Opcional: limitar cantidad de botones visibles si hay muchas páginas
    // Aquí mostramos todos desde 1 hasta totalPaginas
    for (let i = 1; i <= totalPaginas; i++) {
        const li = document.createElement("li");
        li.className = "page-item " + (paginaActual === i ? "active" : "");
        const a = document.createElement("a");
        a.className = "page-link";
        a.href = "#";
        a.textContent = i;
        a.addEventListener("click", (e) => {
            e.preventDefault();
            mostrarPagina(i);
        });
        li.appendChild(a);
        ul.appendChild(li);
    }

    // --- Botón Siguiente ---
    const liSiguiente = document.createElement("li");
    liSiguiente.className = "page-item " + (paginaActual >= totalPaginas ? "disabled" : "");
    const aSiguiente = document.createElement("a");
    aSiguiente.className = "page-link";
    aSiguiente.href = "#";
    aSiguiente.textContent = "Siguiente";
    aSiguiente.addEventListener("click", (e) => {
        e.preventDefault();
        if (paginaActual < totalPaginas) mostrarPagina(paginaActual + 1);
    });
    liSiguiente.appendChild(aSiguiente);
    ul.appendChild(liSiguiente);

    nav.appendChild(ul);
    paginacionContenedor.appendChild(nav);
}


//=====================================================================================================================

// Función para mostrar la página de productos por clase indicada
function mostrarPagina(pagina) {

    //console.log('Mostrar página:', pagina);
    paginaActual = pagina;

    const inicio = (paginaActual - 1) * productosPorPagina;
    const fin = inicio + productosPorPagina;

    const productosPagina = productosPaginados.slice(inicio, fin);

    mostrarProductos(productosPagina);
    mostrarPaginacion();
}

//==========================================================================================================================

async function obtenerInforProductoPorNombre(nombre) {

    try {
        const response = await fetch(
            "index.php?action=consultaProductoNombre",
            {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({ Nombre: nombre }),
            }
        );

        const data = await response.json();

        if (data.success) {
            productosPaginados = data.inforProducto; // Guarda todos los productos
            //console.log('Productos obtenidos para paginar:', productosPaginados);
            mostrarPagina(1); // Muestra la primera página
        }
    } catch (error) {
        console.error('Error al obtener los datos del producto:', error);
    }
}

//========================================================================================================================================

document.getElementById('formBuscarProducto').addEventListener('submit', function (e) {
    e.preventDefault(); // Previene el envío clásico del formulario

    const nombre = document.getElementById('inputNombreProducto').value.trim();

    if (nombre !== "") {
        obtenerInforProductoPorNombre(nombre);
    }
});