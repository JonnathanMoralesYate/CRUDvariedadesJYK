
const codigoBarras = document.getElementById('codProduc');

// Obtener el checkbox por su ID
const checkboxGeneraCodigoB = document.getElementById('codigoGenerado');

// Agregar un manejador de eventos para el evento 'change'
checkboxGeneraCodigoB.addEventListener('change', async function() {

    if (checkboxGeneraCodigoB.checked) {

        //console.log('Genera el codigo, está marcado.');

        const idConsecutivo= 1;

        const consecutivo = await consultarConsecutivoCodigo(idConsecutivo);
        //alert("consecutivoBD: "+ consecutivo)

        //Convertimos el resultado en numero
        const consecutivoN  = parseFloat(consecutivo);

        const consecutivoNuevo = consecutivoN + 1;

        codigoBarras.value = consecutivoNuevo;


    } else {

        //console.log('El checkbox no está marcado.');

        document.getElementById('codProduc').value = '';

    }
});


//Funcion para taer el consecutivo del codigo de barras
async function consultarConsecutivoCodigo($idConsecutivo) {
    if ($idConsecutivo) {
        try {
            const response = await fetch('./utils/obtenerConsecutivoCodigoB.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'idConsecutivo=' + encodeURIComponent($idConsecutivo)
            });

            const data = await response.json();

            // Imprimir la respuesta en la consola
            //console.log('Respuesta del servidor:', data);

            if (data.success) {

                return data.consecutivo.CodigoBarra;

            } else {
                console.error('Error:', data.error);
                return null;
            }
        } catch (error) {
            console.error('Error al obtener el consecutivo:', error);
            return null;
        }
    }
    return null;  // Si no se proporciona $idConsecutivo
}