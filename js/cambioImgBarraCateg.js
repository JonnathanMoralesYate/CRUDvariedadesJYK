// Función que cambia las imágenes de la categoria Vitaminas
function cambImgVit() {
    document.getElementById('cateGen1').src = './photo/multivitCentrunHom.png';
    document.getElementById('cateGen2').src = './photo/multivitCentrunSilver.png';
    document.getElementById('cateGen3').src = './photo/multivitCentrunWom.png';
    document.getElementById('cateGen4').src = './photo/vitaminaB12.png';
    document.getElementById('cateGen5').src = './photo/vitB12Nutricost.png';
    document.getElementById('cateGen6').src = './photo/vitCHeathy.png';
    document.getElementById('cateGen7').src = './photo/vitCMk.png';
    document.getElementById('cateGen8').src = './photo/vityCalcioCaltrate.png';
    document.getElementById('cateGen9').src = './photo/vityCalcioCaltrateBone.png';
}

// Escucha el evento de clic en el botón y ejecuta la función (por medio del Id del button) 
document.getElementById('changeImgCatVitaminas').addEventListener('click', cambImgVit);

// Cambia la marca y descripcion del producto de categoria Vitaminas 
function cambMarcyDescripProdVit() {
    document.getElementById("marcProduc1").innerHTML = "<i>Centrun Adults</i>";
    document.getElementById("descriProduc1").innerHTML = "<i>Multivitaminico</i>";
    document.getElementById("marcProduc2").innerHTML = "<i>Centrun Silver</i>";
    document.getElementById("descriProduc2").innerHTML = "<i>Multivitaminico</i>";
    document.getElementById("marcProduc3").innerHTML = "<i>Centrun Women</i>";
    document.getElementById("descriProduc3").innerHTML = "<i>Mutivitaminico</i>";
    document.getElementById("marcProduc4").innerHTML = "<i>Life</i>";
    document.getElementById("descriProduc4").innerHTML = "<i>Vitamina B12</i>";
    document.getElementById("marcProduc5").innerHTML = "<i>Nutricost</i>";
    document.getElementById("descriProduc5").innerHTML = "<i>Vitamina B12</i>";
    document.getElementById("marcProduc6").innerHTML = "<i>Heathy American</i>";
    document.getElementById("descriProduc6").innerHTML = "<i>Vitamina C 1000mg</i>";
    document.getElementById("marcProduc7").innerHTML = "<i>Mk</i>";
    document.getElementById("descriProduc7").innerHTML = "<i>Vitamina C</i>";
    document.getElementById("marcProduc8").innerHTML = "<i>Caltrate</i>";
    document.getElementById("descriProduc8").innerHTML = "<i>Calcio y Vitamina D</i>";
    document.getElementById("marcProduc9").innerHTML = "<i>Caltrata Bone</i>";
    document.getElementById("descriProduc9").innerHTML = "<i>Calcio y Vitamina D</i>";

}

// Escucha el evento de clic en el botón y ejecuta la función (por medio del Id del button) 
document.getElementById('changeImgCatVitaminas').addEventListener('click', cambMarcyDescripProdVit);


// Función que cambia las imágenes de la categoria Pañales
function cambImgPañal() {
    document.getElementById('cateGen1').src = './photo/PañalesBabysec.png';
    document.getElementById('cateGen2').src = './photo/PañalesBubu.png';
    document.getElementById('cateGen3').src = './photo/PañalesBummis.png';
    document.getElementById('cateGen4').src = './photo/PañalesCare.png';
    document.getElementById('cateGen5').src = './photo/PañalesHuggies.png';
    document.getElementById('cateGen6').src = './photo/PañalesKimbies.png';
    document.getElementById('cateGen7').src = './photo/PañalesPampers.png';
    document.getElementById('cateGen8').src = './photo/PañalesPequeñin.png';
    document.getElementById('cateGen9').src = './photo/PañalesWinny.png';
}

// Escucha el evento de clic en el botón y ejecuta la función
document.getElementById('changeImgCatPañales').addEventListener('click', cambImgPañal);

// Cambia la marca y descripcion del producto de categoria Pañales
function cambMarcyDescripProdPañal() {
    document.getElementById("marcProduc1").innerHTML = "<i>Pañales Babysec</i>";
    document.getElementById("descriProduc1").innerHTML = "<i>Etapa 1</i>";
    document.getElementById("marcProduc2").innerHTML = "<i>Pañales Bubu</i>";
    document.getElementById("descriProduc2").innerHTML = "<i>Etapa 0</i>";
    document.getElementById("marcProduc3").innerHTML = "<i>Pañales Bummis</i>";
    document.getElementById("descriProduc3").innerHTML = "<i>Etapa 2</i>";
    document.getElementById("marcProduc4").innerHTML = "<i>Pañales Care baby</i>";
    document.getElementById("descriProduc4").innerHTML = "<i>Etapa 0</i>";
    document.getElementById("marcProduc5").innerHTML = "<i>Pañales Huggies</i>";
    document.getElementById("descriProduc5").innerHTML = "<i>Etapa 3</i>";
    document.getElementById("marcProduc6").innerHTML = "<i>Pañales Kimbies</i>";
    document.getElementById("descriProduc6").innerHTML = "<i>Etapa 4</i>";
    document.getElementById("marcProduc7").innerHTML = "<i>Pañales Pampers</i>";
    document.getElementById("descriProduc7").innerHTML = "<i>Etapa 1</i>";
    document.getElementById("marcProduc8").innerHTML = "<i>Pañales Pequeñin</i>";
    document.getElementById("descriProduc8").innerHTML = "<i>Etapa 2</i>";
    document.getElementById("marcProduc9").innerHTML = "<i>Pañales Winny</i>";
    document.getElementById("descriProduc9").innerHTML = "<i>Etapa 5</i>";

}

// Escucha el evento de clic en el botón y ejecuta la función (por medio del Id del button) 
document.getElementById('changeImgCatPañales').addEventListener('click', cambMarcyDescripProdPañal);
