//indica que el código dentro de esta función solo se ejecutará cuando todo el documento HTML haya sido cargado por completo.
//Es útil para asegurarse de que los elementos del DOM (como botones y formularios) estén disponibles antes de intentar acceder a ellos.

document.addEventListener("DOMContentLoaded", function () {
  //Función pare el botón Login: Muestra el formulario de inicio:

  document.getElementById("login_inic").addEventListener("click", function () {
    var elemento = document.getElementById("login_form");

    if (elemento.style.display === "none" || elemento.style.display === "") {
      elemento.style.display = "block"; // Muestra el elemento
    } else {
      elemento.style.display = "none"; // Oculta el elemento si ya está visible
    }
  });
});

//Función para el botón cerrarL (X) : Cierra el formulario de inicio de sesión.

document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("cerrarL").addEventListener("click", function () {
    var elemento = document.getElementById("login_form");

    if (elemento.style.display === "block") {
      elemento.style.display = "none";
    }
  });
});
