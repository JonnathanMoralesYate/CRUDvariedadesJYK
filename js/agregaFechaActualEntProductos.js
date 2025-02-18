
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