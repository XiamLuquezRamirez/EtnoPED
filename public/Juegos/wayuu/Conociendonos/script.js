let conse = 0;
let score = 0;
let timer;
let PregMostrada = [];

var respuestas = [];

var preguntas = [
  {
    id: 1,
    enunciado: "Para conjugar al tiempo presente se coloca la raíz del verbo, luego la vocal ü y se utilizan los sufijos estos son:",
    opciones: [
      "SHI – SU – SHI",
      "SHA – SHE – SHI ",
      "Todas las anteriores ",
      "Todas las anteriores ",
    ],
    respuestaCorrecta: 0,
  },
  {
    id: 2,
    enunciado:
      "Para conjugar el tiempo en pasado se escribe la raíz, luego se escribe de enlace la vocal ü y se utiliza los sufijos estos son:",
    opciones: ["SHI – SU – SHI", "ICHIPA – ipa - inapa", "SHA – SHE – SHI ", "Todas las anteriores "],
    respuestaCorrecta: 1,
  },
  {
    id: 3,
    enunciado:
      "Para conjugar el tiempo futuro se coloca la raíz, se escriben los sufijos estos son:",
    opciones: [

      "SHI – SU – SHI",
      "ICHIPA – ipa - inapa",
      "SHA – SHE – SHI ",
      "Eechi – eerü - eena   ",
    ],
    respuestaCorrecta: 3,
  },
  {
    id: 4,
    enunciado:
      "¿Para conjugar al tiempo presente se coloca la raíz del verbo, luego la vocal ?",
    opciones: [
      "E",
      "O",
      "aa",
      "D.	ü",
    ],
    respuestaCorrecta: 3,
  },
  {
    id: 5,
    enunciado:
      "¿Al conjugar un verbo a presente se utiliza para masculino singular el sufijo?",
    opciones: [
      "Ekaa",
      "Sü",
      "Shi",
      "Tura",
    ],
    respuestaCorrecta: 2,
  },
  {
    id: 6,
    enunciado:
      "¿Cual es sufijo que se utiliza para conjugar singular femenino?",
    opciones: [
      "Shi",
      "waya",
      "Su",
      "Palaa",
    ],
    respuestaCorrecta: 2,
  },
  {
    id: 7,
    enunciado:
      "Sufijo para plural (ambos géneros).",
    opciones: [
      "Waya",
      "Jia",
      "Shi",
      "Naya",
    ],
    respuestaCorrecta: 2,
  },
  {
    id: 8,
    enunciado:
      "Completa la oración con el adverbio correspondiente 'Maria (mariia) mattsujainsat aküjaa _________. (Maria nunca dice la verdad'",
    opciones: [
      "Watta",
      "Shimuin ",
      "Pejesü",
      "Ninguna de las anteriores"
    ],
    respuestaCorrecta: 1,
  },
  {
    id: 9,
    enunciado:
      "Completa la oración con el adverbio correspondiente 'Chaa tepia __________. (mi casa queda lejos)'",
    opciones: [
      "Maalü",
      "Jeera",
      "Wattasü",
      "Ninguna de las anteriores"
    ],
    respuestaCorrecta: 2,
  },
  {
    id: 10,
    enunciado:
      "Completa la oración con el adverbio correspondiente 'Ayatashi taya __________ sülia tepia. (Yo trabajo lejos de mi casa)'",
    opciones: [
      "Shiaya",
      "Jamüsüa ",
      "Watta",
      "Ninguna de las anteriores"
    ],
    respuestaCorrecta: 2,
  },
  {
    id: 11,
    enunciado: "Completa la oración con el adverbio correspondiente '___________ tantuin anain tashein. ( no consigo mi ropa)'",
    opciones: [ "Nalain", "Nnojotsü  ", "Alawa ","Ninguna de las anteriores",],
    respuestaCorrecta: 1,
  },
  {
    id: 12,
    enunciado:
      "Completa la oración con el adverbio correspondiente '__________ matuja>arü jantüle. (No se sabe si llegan)'",
    opciones: [
      "Nnopotsu",
      "Ajaa",
      "Jamerüin ",
      "Ninguna de las anteriores"
    ],
    respuestaCorrecta: 2,
  },
  {
    id: 13,
    enunciado: "Completa la oración con el adverbio correspondiente 'Tüü ___________ sainjia. (eso está mal hecho)'",
    opciones: [
      "Ja>laya",
      "Mojusü",
      "Maalü ",
      "Ninguna de las anteriores"
    ],
    respuestaCorrecta: 1,
  },
  {
    id: 14,
    enunciado:
      "Completa la oración con el adverbio correspondiente 'Oüneesü taitka ____________ sanain erejerra. (Mi tia quiere ir pronto al médico)'",
    opciones: [
      "Maalü",
      "Yootchon",
      "So>omüin",
      "Ninguna de las anteriores"
    ],
    respuestaCorrecta: 0,
  },
  {
    id: 15,
    enunciado:
      "Completa la oración con el adverbio correspondiente 'Matunküinsat taya ___________. (Hoy no he dormido)'",
    opciones: [
      "Wattapia",
      "Mojusü",
      "So>ukai ",
      "Ninguna de las anteriores"
    ],
    respuestaCorrecta: 2,
  },
  {
    id: 16,
    enunciado:
      "Completa la oración con el adverbio correspondiente '__________ suchikanain nüii José. (Las huellas de los zapatos de José son recientes)' ",
    opciones: [
      "Kaleü",
      "Jeketü ",
      "Jolü>ü ",
      "Ninguna de las anteriores"
    ],
    respuestaCorrecta: 1,
  },
  {
    id: 17,
    enunciado:
      "Como se dice: Buenos días",
    opciones: [
      "Antushipia",
      "Wattau maalüa",
      "Jouya",
      "Ninguna de las anteriores"
    ],
    respuestaCorrecta: 1,
  },
  {
    id: 18,
    enunciado:
      "Como se dice: ¿De dónde eres?",
    opciones: [
      "Jalashi waya",
      "Alatshi waya",
      "Jaleejeewat pia",
      "Ninguna de las anteriores"
    ],
    respuestaCorrecta: 2,
  },
  {
    id: 19,
    enunciado: "Como se dice: ¿Cuántos años tienes?",
    opciones: [
      "wayuu",
      "jeera püyasha",
      "jintut ",
      "Ninguna de las anteriores"
    ],
    respuestaCorrecta: 1,
  },
  {
    id: 20,
    enunciado:
      "Como se dice: ¿Cuál es tu casta o apellido?",
    opciones: [
      "Jalashi",
      "Joutai",
      "Kasairüt pia",
      "Ninguna de las anteriores"
    ],
    respuestaCorrecta: 2,
  },
  {
    id: 21,
    enunciado:
      "Como se dice: ¿Como se llama tu papá?",
    opciones: [
      "kasaichi nünülia pushi ",
      "Kau>la ",
      "Toushi",
      "Ninguna de las anteriores"
    ],
    respuestaCorrecta: 0,
  },
  {
    id: 22,
    enunciado:
      "Como se dice: Tengo sueño",
    opciones: [
      "Yamapia",
      "Atünkesü tain",
      "miichi",
      "Ninguna de las anteriores"
    ],
    respuestaCorrecta: 1,
  },
  {
    id: 23,
    enunciado:
      "Como se dice: Hola en wayuu",
    opciones: [
      "Aipana ",
      "Kai",
      "Jamaya",
      "Ninguna de las anteriores"
    ],
    respuestaCorrecta: 2,
  },
  {
    id: 24,
    enunciado:
      "Que es lo primero que brinda un wayuu cuando lo visitan:",
    opciones: [
      "Chicha",
      "Café ",
      "La silla",
      "Ninguna de las anteriores"
    ],
    respuestaCorrecta: 1,
  },
  {
    id: 25,
    enunciado:
      "En que parte de la casa reciben la visita:",
    opciones: [
      "En la puerta",
      "Cocina",
      "Enrramada",
      "Ninguna de las anteriores"
    ],
    respuestaCorrecta: 2,
  },
  {
    id: 26,
    enunciado:
      "Los wayuu acostumbran brindar a las visitas:",
    opciones: [
      "Comida",
      "Jugo",
      "Picadas",
      "Ninguna de las anteriores"
    ],
    respuestaCorrecta: 0,
  },
];

var firstMove = true; // Variable para controlar la primera iteración
function moveDivs(direction) {
  var container = document.querySelector(".container");
  var divs = document.querySelectorAll(".box");
  var moveAmount = 50; // Cantidad de píxeles que se moverán
  var executedLose = false;

  if (direction === 1) {
    document.getElementById("locoDer").src = "locomotoraDerechaMovi.gif";

  } else {
    document.getElementById("locoIzq").src = "locomotoraIzquierdaMovi.gif";
  }

  if (firstMove) {
    divs.forEach(function (div) {
      var currentLeft = parseInt(
        div.style.transform.replace("translateX(", "").replace("px)", "") || 0
      );
      var newLeft = currentLeft + moveAmount * direction;

      div.style.transform = "translateX(" + newLeft + "px)";

      // Escuchar el evento de transición para cada div
      div.addEventListener("transitionend", function () {
        // Verificar si la transición es para el tren que se ha movido
        if (div.id === "div1" && direction === 1) {
          document.getElementById("locoDer").src = "locomotoraDerecha.png";
        } else if (div.id === "div3" && direction === -1) {
          document.getElementById("locoIzq").src = "locomotoraIzquierda.png";
        }
      });

    });
  }

  // Ajustar el ancho del contenedor para que los divs no se desborden
  var containerWidth = divs.length * (moveAmount + 10) - 10;
  container.style.width = containerWidth + "px";
  var resul = "";
  // Verificar si alguna división ha recorrido exactamente 500px
  setTimeout(function () {
    divs.forEach(function (div) {
      var currentLeft = parseInt(
        div.style.transform.replace("translateX(", "").replace("px)", "") || 0
      );
      console.log(Math.abs(currentLeft))
      if (Math.abs(currentLeft) === 300 && !executedLose) {
        executedLose = true;
        if (direction === 1) {
          resultadoFinal('lose');
        } else {
          resultadoFinal('win');
        }
      }
    });

  }, 10000);
}

function obtenerIndiceAleatorio() {
  let indice = Math.floor(Math.random() * preguntas.length);
  while (PregMostrada.includes(indice)) {
    indice = Math.floor(Math.random() * preguntas.length);
  }
  PregMostrada.push(indice);

  return indice;
}

$(document).ready(function () {
  generarPreguntaHTML();
  abrirModal();

});


function resultadoFinal(resul) {
  $("#principal").fadeToggle(1000);
  $("#final").fadeToggle(1000);



  if (resul == "lose") {
    var audio = new Audio("../../sounds/game_over.mp3");
    audio.play();
    document.getElementById("final").style.backgroundImage =
      "url(../../images/derrota.gif)";
    document.getElementById("texto_final").innerText =
      "Lo siento no has superado el reto";
  } else {
    document.getElementById("final").style.backgroundImage =
      "url(../../images/victoria.gif)";
    var audio = new Audio("../../sounds/victory.mp3");
    document.getElementById("texto_final").innerText =
      "Feliictaciones has logrado superar el Reto";
    audio.play();

  }

}

function generarPreguntaHTML(pregunta) {
  let index = obtenerIndiceAleatorio();

  var pregunta = preguntas[index];

  var preguntaHTML = document.getElementById("pregunta");
  preguntaHTML.textContent = pregunta.enunciado;

  var opcionesHTML = document.getElementById("opciones");
  opcionesHTML.innerHTML = "";
  opcionesHTML.classList.remove("bloqueada");

  pregunta.opciones.forEach(function (opcion, indice) {
    var opcionHTML = document.createElement("div");
    opcionHTML.classList.add("opcion");
    opcionHTML.textContent = opcion;
    opcionHTML.setAttribute("data-indice", indice);
    opcionesHTML.appendChild(opcionHTML);
  });

  addevento();
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


function addevento() {
  // Obtener todos los elementos de opción
  var opciones = document.querySelectorAll(".opcion");

  // Agregar evento de clic a cada opción
  opciones.forEach(function (opcion) {
    opcion.addEventListener("click", function () {
      // Remover la clase 'seleccionada' de todas las opciones
      opciones.forEach(function (op) {
        op.classList.remove("seleccionada", "correcta", "incorrecta");

      });


      // Agregar la clase 'seleccionada' a la opción clickeada
      opcion.classList.add("seleccionada");
      var opcionesHTML = document.getElementById("opciones");
      opcionesHTML.classList.add("bloqueada");

      // Obtener el índice de la opción seleccionada
      var indiceRespuesta = parseInt(opcion.getAttribute("data-indice"));

      // Obtener la pregunta actual
      var preguntaActual = preguntas.find(function (pregunta) {
        return pregunta.id === 1; // Reemplaza 1 con el ID de la pregunta actual
      });

      // Verificar si la respuesta seleccionada es correcta
      if (indiceRespuesta === preguntaActual.respuestaCorrecta) {
        opcion.classList.add("correcta");
        moveDivs(-1);
        setTimeout(function () {
          generarPreguntaHTML();
        }, 10000);
      } else {
        opcion.classList.add("incorrecta");
        opciones[preguntaActual.respuestaCorrecta].classList.add("correcta");

        moveDivs(1);
        setTimeout(function () {
          generarPreguntaHTML();
        }, 10000);
      }

    });
  });
}
