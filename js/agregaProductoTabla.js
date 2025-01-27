
        let codProducto = '';
        let productosAgregados = []; // Array para almacenar los productos que se agregan

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Enter') {
                // Enviar el código de barras al PHP para buscar el producto
                fetch('buscar_producto.php?codigo=' + codProducto)
                    .then(response => response.json())
                    .then(data => {
                        if (data) {
                            // Producto encontrado, lo mostramos en los campos del formulario
                            document.getElementById('producto').value = data.nombre;
                            document.getElementById('precio').value = data.precio;
                        } else {
                            alert('Producto no encontrado');
                        }
                    });
                codProducto = ''; // Reseteamos el código
            } else {
                codProducto += e.key; // Acumulamos las teclas del código de barras
            }
        });
