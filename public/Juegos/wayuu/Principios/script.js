let conse = 0;
let score = 0;
let timer;
let PregMostrada = [];
let partesR = 16;
let imgSistema = "";
let nombreSistema = "";

// Función para iniciar el juego
var preguntasAleatorias;
var index = 0;
var respactual = "";
var respCorrectas = 0;
var respIncorrectas = 0;
var actual = 0;
var PregRespuesta = [];

function startGame() {
  var element = document.getElementById("puntoIsla0");
  element.style.backgroundImage = "url(img/posActual.png)";
}

$(document).ready(function () {
  startGame();
  abrirModal();
});


function resultadoFinal() {
  $("#principal").fadeToggle(1000);
  $("#final").fadeToggle(1000);

  var porPre =(nResp/userScore)*100;

  if (porPre < 60) {
    var audio = new Audio("../../sounds/game_over.mp3");
    audio.play();
    document.getElementById("final").style.backgroundImage =
      "url(../../images/derrota.gif)";
    document.getElementById("texto_final").innerText =
      "Lo siento solo has logrado contestar Correctamente  " +
      userScore +
      " de "+nResp+" Preguntas Posibles";
  } else {
    document.getElementById("final").style.backgroundImage =
      "url(../../images/victoria.gif)";
    var audio = new Audio("../../sounds/victory.mp3");
    audio.play();
    document.getElementById("texto_final").innerText =
      "Felicitaciones has logrado contestar Correctamente  " +
      userScore +
      " de "+nResp+" Preguntas Posibles";
  }
}

function verfResp() {
  if (Respuesta == "ok") {
    fadeOutBackground(targetCell, 'url("img/pregOk.png")');
    targetCell.style.backgroundSize = "45%";
    targetCell.style.backgroundRepeat = "no-repeat";
  } else {
    fadeOutBackground(targetCell, 'url("img/pregFail.png")');
    targetCell.style.backgroundSize = "45%";
    targetCell.style.backgroundRepeat = "no-repeat";
  }

  if (nResp == 5) {
    let posi = 62;
    setTimeout(() => {
      fadeOutBackground(cells[posi], 'url("img/metaOpen.gif")');
    }, 1000);

    setTimeout(() => {
      fadeOutBackground(cells[posi], 'url("img/metaOpen.png")');
    }, 2000);
  }
}

function obtenerIndiceAleatorio() {
  let indice = Math.floor(Math.random() * Preguntas.length);
  while (PregMostrada.includes(indice)) {
    indice = Math.floor(Math.random() * Preguntas.length);
  }
  PregMostrada.push(indice);

  return indice;
}

var scale = 1;

function cambiarEscala() {
  if (scale === 1) {
    scale = 0.8; // Reducción de escala en un 20%
  } else {
    scale = 1.2; // Aumento de escala en un 20%
  }

  document.getElementById("divGirar").style.transform = "scale(" + scale + ")";

}

function abrirModal() {

  Swal.fire({
      title: "<strong>Juego de Gramática</strong>",
      type: "info",
      html: "En este juego deberás seleccionar la respuesta correcta a la pregunta mostrada. cada respuesta incorrecta hara que la locomotora te lleva hacia la derecha.",
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

setInterval(cambiarEscala, 2000); // Cambio de escala cada 2 segundos (2000 milisegundos)

// Iniciar el cambio de escala al cargar la página
window.addEventListener("load", cambiarEscala);
