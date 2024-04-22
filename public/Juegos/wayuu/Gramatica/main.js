const scoreBoard = document.querySelector("#score");
const moles = document.querySelectorAll(".mole");
const holes = document.querySelectorAll(".hole");

let score = 0;
let inscore = 0;
let timeUp = false;
let lastHole;

function ramdomTime(min, max) {
  return Math.round(Math.random() * (max - min) + min);
}

function ramdomHole(holes) {
  const randomHans = Math.floor(Math.random() * holes.length);
  const hole = holes[randomHans];
  if (hole === lastHole) {
    console.log("es el mismo hueco " + randomHans);
    return ramdomHole(holes);
  }

  lastHole = hole;
  return hole;
}

function peep() {
  const time = ramdomTime(4500, 5000);
  const topo = ramdomHole(holes);
  topo.classList.remove("over");
  topo.classList.remove("bajar");
  topo.classList.add("up");
  setTimeout(() => {
    topo.classList.remove("up");
    if (!timeUp) peep();
  }, time);
}

let numeroPregunta = 0;
let preguntas = [];

function startGame() {


  if (numeroPregunta < 10) {
    let moles_divs = [];
    for (let index = 0; index < moles.length; index++) {
      const element = moles[index];
      moles_divs.push(element);
    }

    moles_divs = randomValueGenerator(moles_divs);

    var pregunta = preguntas[numeroPregunta];

    document.getElementById("pregunta").innerText = pregunta.pregunta;
    var opciones = pregunta.opciones;

    for (let index = 0; index < 4; index++) {
      const element = moles_divs[index];
      element.setAttribute("data-id", opciones[index][1]);
      element.innerHTML = "<h5 style='margin-top: 40%; width: 100%; height: fit-content;' class='respuesta'>" + opciones[index][0] + "</h5>"
    }

    moles.forEach((topo) => topo.addEventListener("click", wack));
    timeUp = false;
    peep();
    setTimeout(() => (timeUp = true), 900000);
  } else {
    $('#principal').fadeToggle(500);
    setTimeout(() => {
      $('#final').fadeToggle(1000);
    }, 500)

    if (((score / 10) * 100) < 60) {
      document.getElementById("final").style.backgroundImage = "url(../../images/derrota.gif)";
      var audio = new Audio('../../sounds/game_over.mp3');
      audio.play();
    } else {
      document.getElementById("final").style.backgroundImage = "url(../../images/victoria.gif)";
      var audio = new Audio('../../sounds/victory.mp3');
      audio.play();
    }

    document.getElementById("texto_final").innerText = "Has contestado correctamente " + score + " de " + "10 preguntas.";
    
  }
}


function abrirModal() { 
   
  Swal.fire({
      title: "<strong>Juego de Gramática</strong>",
      type: "info",
      html: "En este juego deberás enviar la flecha al topo que contenga la respuesta correcta a la pregunta realizada.",
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




function wack(e) {
  moles.forEach((topo) => topo.setAttribute("onclick", ""));
  timeUp = true;
  if (!e.isTrusted) return;
  let dt = this.getAttribute("data-id");

  var pos = this.getBoundingClientRect();
  var flecha = document.getElementById("flecha");

  var posicionActualLeft = flecha.offsetLeft;
  var posicionActualTop = flecha.offsetTop;

  if (this.getAttribute("data-pos") == "1") {
    flecha.style.left = pos.left + 70 + "px";
    flecha.style.top = pos.top + 30 + "px";
    flecha.style.display = "block";
  }else if (this.getAttribute("data-pos") == "2") {
    flecha.style.left = pos.left + 100 + "px";
    flecha.style.top = pos.top + 30 + "px";
    flecha.style.display = "block";
  }else if (this.getAttribute("data-pos") == "3") {
    flecha.style.left = pos.left + 70 + "px";
    flecha.style.top = pos.top + 40 + "px";
    flecha.style.display = "block";
  }else{
    flecha.style.left = pos.left + 100  + "px";
    flecha.style.top = pos.top + 40 + "px";
    flecha.style.display = "block";
  }

  setTimeout(() => {
    flecha.style.display = "none";
}, 810);

setTimeout(() => {
  flecha.style.position = "absolute";
  flecha.style.display = "block";
  flecha.style.transitionProperty = "left";
  flecha.style.left = posicionActualLeft + "px";
  flecha.style.top = posicionActualTop + "px";

  setTimeout(() => {
      flecha.style.transitionProperty = "top, left";
  }, 300);
}, 1000);


  if (dt == "true") {
    this.parentElement.classList.add("ok");
    setTimeout(() => {
      this.parentElement.classList.add("bajar");

      setTimeout(() => {
        this.parentElement.classList.remove("ok");
        numeroPregunta++;
        startGame();
      }, 2000);
    }, 1500)
    score++;
    scoreBoard.innerText = "Correctas " + score;
  } else {
    this.parentElement.classList.add("over");
    setTimeout(() => {
      this.parentElement.classList.add("bajar");
      setTimeout(() => {
        this.parentElement.classList.remove("over");
        numeroPregunta++;
        startGame();
        
      }, 2000);
    }, 1500)
    inscore++;
  }

}

let tipo_ope = 0;
$(document).ready(function () {
  var base_preguntas = readText("preguntas.json");
  preguntas = JSON.parse(base_preguntas);
  preguntas = randomValueGenerator(preguntas);
  startGame();
  abrirModal();
});



var img = $('.flecha');
document.onmousemove = function () {
    var offset = img.offset();
    var center_x = (offset.left) + (img.width() / 2);
    var center_y = (offset.top) + (img.height() / 2);
    var mouse_x = event.pageX;
    var mouse_y = event.pageY;
    var radians = Math.atan2(mouse_x - center_x, mouse_y - center_y);
    var degree = (radians * (180 / Math.PI) * -1) - 180;
    img.css('-moz-transform', 'rotate(' + degree + 'deg)');
    img.css('-webkit-transform', 'rotate(' + degree + 'deg)');
    img.css('-o-transform', 'rotate(' + degree + 'deg)');
    img.css('-ms-transform', 'rotate(' + degree + 'deg)');
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


function randomValueGenerator(vector) {
  return vector.sort(function () { return Math.random() - 0.5 });
};