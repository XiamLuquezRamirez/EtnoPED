let adverbiosSeleccionados = [];
let cateSel1 = "";
let cateSel2 = "";
let letraSel1 = "";
let letraSel2 = "";


$(document).ready(function () {

    const elementosSeleccionados = seleccionarElementosAleatorios(clasifig, 2);
    const texto = `Selecciona "${elementosSeleccionados[0].letra}" (Adverbios de ${elementosSeleccionados[0].advervio}) o "${elementosSeleccionados[1].letra}" (Adverbios de  ${elementosSeleccionados[1].advervio}), según corresponda.`;
    cateSel1 = elementosSeleccionados[0].advervio;
    cateSel2 = elementosSeleccionados[1].advervio;
    letraSel1 = elementosSeleccionados[0].letra;
    letraSel2 = elementosSeleccionados[1].letra;
    document.getElementById("tit-juego").innerHTML = texto;
    document.getElementById("glob1").innerHTML = letraSel1;
    document.getElementById("glob2").innerHTML = letraSel2;

    const div1 = document.getElementById("div-glob1"); // Reemplaza "miDiv" con el ID de tu div
    const div2 = document.getElementById("div-glob2"); // Reemplaza "miDiv" con el ID de tu div

    // Agrega el evento onclick al div
    div1.setAttribute(
        "onclick",
        "romper(this, '" + cateSel1 + "', '" + letraSel1 + "')"
    );
    div2.setAttribute(
        "onclick",
        "romper(this, '" + cateSel2 + "', '" + letraSel2 + "')"
    );

    const adverbiosCateSel1 = adverbio.filter(
        (adverbio) => adverbio.clasif === cateSel1
    );

    // Filtrar los adverbios por la categoría cateSel2
    const adverbiosCateSel2 = adverbio.filter(
        (adverbio) => adverbio.clasif === cateSel2
    );

    const adverbiosSeleccionadosCateSel1 = seleccionarAleatoriamente(
        adverbiosCateSel1,
        5
    );
    const adverbiosSeleccionadosCateSel2 = seleccionarAleatoriamente(
        adverbiosCateSel2,
        5
    );

    // Unir los dos arrays de adverbios seleccionados
    adverbiosSeleccionados = adverbiosSeleccionadosCateSel1.concat(
        adverbiosSeleccionadosCateSel2
    );

    desordenarArray(adverbiosSeleccionados);

    preguntar();

    abrirModal();

    
});

function abrirModal() { 
   
    Swal.fire({
        title: "<strong>Juego de Adverbios</strong>",
        type: "info",
        html: "En este juego deberás enviar la flecha al grupo que corresponda cada adverbio mostrado",
        showCloseButton: true,
        showCancelButton: true,
        focusConfirm: false,
        confirmButtonText: '<i class="fa fa-thumbs-up"></i> Vamos!',
        confirmButtonAriaLabel: "Thumbs up, great!",
        cancelButtonText: '<i class="fa fa-thumbs-down"></i>',
        cancelButtonAriaLabel: "Thumbs down",
        confirmButtonClass: "btn btn-primary",
        buttonsStyling: false,
        cancelButtonClass: "btn btn-danger ml-1"
      }).then((result) => {
        if (result.value) {
          // Se ha hecho clic en el botón "Aceptar"
          // Llama a la función que deseas ejecutar
          activarPantallaCompleta();
        } else if (result.dismiss === Swal.DismissReason.cancel) {
          // Se ha hecho clic en el botón "Cancelar"
          // Regresa a la página anterior
          window.history.back();
        }
      });
}




function activarPantallaCompleta() {
    if (document.documentElement.requestFullscreen) {
        document.documentElement.requestFullscreen();
    } else if (document.documentElement.mozRequestFullScreen) {
        document.documentElement.mozRequestFullScreen();
    } else if (document.documentElement.webkitRequestFullscreen) {
        document.documentElement.webkitRequestFullscreen();
    } else if (document.documentElement.msRequestFullscreen) {
        document.documentElement.msRequestFullscreen();
    }
}


function seleccionarElementosAleatorios(array, cantidad) {
    const elementosAleatorios = [];
    while (elementosAleatorios.length < cantidad) {
        const indiceAleatorio = Math.floor(Math.random() * array.length);
        if (!elementosAleatorios.includes(array[indiceAleatorio])) {
            elementosAleatorios.push(array[indiceAleatorio]);
        }
    }
    return elementosAleatorios;
}

// Seleccionar aleatoriamente 5 elementos de cada categoría
function seleccionarAleatoriamente(array, cantidad) {
    const elementosSeleccionados = [];
    while (elementosSeleccionados.length < cantidad && array.length > 0) {
        const indiceAleatorio = Math.floor(Math.random() * array.length);
        elementosSeleccionados.push(array.splice(indiceAleatorio, 1)[0]);
    }
    return elementosSeleccionados;
}

function desordenarArray(array) {
    for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
    }
}

let pregunta_actual = 0;
let abveAct = "";
function preguntar() {
    console.log(pregunta_actual);
    if (pregunta_actual <= 9) {
        document.getElementById("texto").innerText =
            adverbiosSeleccionados[pregunta_actual].palabraw +
            "\n" +
            adverbiosSeleccionados[pregunta_actual].palabrae;

        abveAct = adverbiosSeleccionados[pregunta_actual].clasif;
      
        document.getElementById("glob1").innerHTML = letraSel1;
        document.getElementById("glob2").innerHTML = letraSel2;
        pregunta_actual++;
    } else {
        $("#principal").fadeToggle(500);
        setTimeout(() => {
            $("#final").fadeToggle(1000);
        }, 500);
        if (correctas >= 6) {
            document.getElementById("final").style.backgroundImage =
                "url(../../images/victoria.gif)";
        } else {
            document.getElementById("final").style.backgroundImage =
                "url(../../images/derrota.gif)";
        }

        document.getElementById("texto_final").innerText =
            "Has respondido correctamente " + correctas + "  preguntas de 10";

        
    }
}

var correctas = 0;
function romper(elemento, opcion, letra) {
    var pos = elemento.getBoundingClientRect();
    var flecha1 = document.getElementById("flecha1");
    var flecha2 = document.getElementById("flecha2");
    var div_glob1 = document.getElementById("div-glob1");
    var div_glob2 = document.getElementById("div-glob2");

    div_glob1.classList.add("bloquearObjetivo");
    div_glob2.classList.add("bloquearObjetivo");



    var posicionActualLeft = flecha1.offsetLeft;
    var posicionActualTop = flecha1.offsetTop;

    var posicionActualLeft2 = flecha2.offsetLeft;
    var posicionActualTop2 = flecha2.offsetTop;

    if (elemento.getAttribute("data-id") == "globo_1") {
        flecha2.style.left = pos.left + 70 + "px";
        flecha2.style.top = pos.top + 20 + "px";
        flecha2.style.display = "block";
    } else {
        flecha1.style.left = pos.left - 70 + "px";
        flecha1.style.top = pos.top + 20 + "px";
        flecha1.style.display = "block";
    }

    var h1 = elemento.firstElementChild;

    setTimeout(() => {
        flecha1.style.display = "none";
        flecha2.style.display = "none";
    }, 810);

    setTimeout(() => {
        elemento.style.backgroundImage = "url(globo_2.png)";

        if (opcion == abveAct) {
            h1.innerText = "!Correcto!";
            h1.style.color = "green";
            correctas++;
        } else {
            h1.innerText = "!Incorrecto!";
            h1.style.color = "red";
        }
    }, 900);

    setTimeout(() => {
        elemento.style.backgroundImage = "url(globo_1.png)";
        h1.innerText = letra;
        h1.style.color = "white";
        preguntar();
    }, 4000);

    setTimeout(() => {
        flecha1.style.position = "absolute";
        flecha1.style.display = "block";
        flecha1.style.transitionProperty = "left";
        flecha1.style.left = posicionActualLeft + "px";
        flecha1.style.top = posicionActualTop + "px";

        flecha2.style.position = "absolute";
        flecha2.style.display = "block";
        flecha2.style.transitionProperty = "left";
        flecha2.style.left = posicionActualLeft2 + "px";
        flecha2.style.top = posicionActualTop2 + "px";


        div_glob1.classList.remove("bloquearObjetivo");
        div_glob2.classList.remove("bloquearObjetivo");

        setTimeout(() => {
            flecha1.style.transitionProperty = "top, left";
            flecha2.style.transitionProperty = "top, left";
        }, 300);
    }, 5000);
}

function readText(ruta_local) {
    var texto = null;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", ruta_local, false);
    xmlhttp.send();
    if (xmlhttp.status == 200) {
        texto = xmlhttp.responseText;
    }
    return texto;
}
