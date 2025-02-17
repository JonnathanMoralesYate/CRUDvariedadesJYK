
    //Funcion al ingresar el codigo del Producto agrege la fecha actual automaticamente
    document.getElementById('codProducto').addEventListener('input', function()  {

            agregarFechaActual();

    });


    //Funcion para agregar la fecha actual de salida del producto
    function agregarFechaActual() {

        const inputFechaEnt = document.getElementById("fechaEnt");

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
        inputFechaEnt.value = fechaHoraFormateada;

    }


    // Funcion verificar el proveedor
    document.getElementById('nitProveedor').addEventListener('blur', async function () {

        const nit = document.getElementById("nitProveedor").value.trim(); // el trim() se utiliza cuando el valor es del input es string

        //alert("nit: "+nit);
        //console.log("valor del NIT: " + nit);
    
            // Evita consulta si el campo del input está vacío
        if (nit === "") {
            //remueve el contenido de la eqtiqueta <p id"resultado"></p>
            document.getElementById("resultado").textContent = "";

            return; // Evita consultas si el campo está vacío
        }
    
        try {
            const response = await fetch('./utils/verificacionProveedor.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'nit=' + encodeURIComponent(nit)  // Envía el NIT al servidor
            });

            const data = await response.json();
    
            if (data.success) {
                if (data.proveedor && data.proveedor.idProveedor) {
                    document.getElementById("resultado").innerText = "✅ Proveedor registrado";
                    document.getElementById("resultado").style.color = "green";
                    //alert("nit valido:" + nit);
                } 
            } else {
                document.getElementById("resultado").innerText = "❌ Proveedor NO registrado";
                document.getElementById("resultado").style.color = "red";
                //alert("nit no valido:");
            }
        } catch (error) {
            console.error('Error al obtener la información del proveedor:', error);
            document.getElementById("resultado").innerText = "⚠️ Error en la consulta";
            document.getElementById("resultado").style.color = "orange";
        }
    });



    // Funcion verificar el producto esta registrado en BD
    document.getElementById('codProducto').addEventListener('blur', async function () {

        const codigoBarras = document.getElementById("codProducto").value.trim(); // el trim() se utiliza cuando el valor es del input es string

         // Evita consulta si el campo del input está vacío
            if (codigoBarras === "") {
                return;
            }

        try {
            const response = await fetch('./utils/obtenerIdProducto.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                // Envía el código de barras al servidor
                body: 'codProducto=' + encodeURIComponent(codigoBarras)  
            });

            // Conviértelo a un objeto JSON
            const data = await response.json();
    
            if (data.success) {

                // Verifica que data.producto esté disponible y tenga idProducto
                if (data.producto && data.producto.idProducto) {

                    //return data.producto.idProducto;
                    alert("Producto esta registrado");

                } 
            } else {
                alert('Producto No Registrado.');
                document.getElementById("codProducto").value = "";
                document.getElementById("fechaEnt").value = "";
                //return null;
            }
            } catch (error) {
                console.error('Error al obtener el id del producto:', error);
                return null;
            }

    });


