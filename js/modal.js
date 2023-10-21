const open = document.getElementById('open');
const modal_container = document.getElementById('modal_container');
const close = document.getElementById('close');

open.addEventListener('click', () => {
  modal_container.classList.add('show');
});

close.addEventListener('click', () => {
  modal_container.classList.remove('show');
  limpiarModal();
});

function obtenerDatos() {

  let nombre = document.getElementById("nombre").value;
  let apellidoPaterno = document.getElementById("ap").value;
  let apellidoMaterno = document.getElementById("am").value;
  let correoElectronico = document.getElementById("email").value;
  let identidadUsuario = document.getElementById("identidad").value;

  let cuerpoModal = document.querySelector("#modal_container .modal");

  cuerpoModal.innerHTML += '<div class="datos"> <h4>Nombre:</h4> <p class="nombre">' + nombre + '</p> </div>';

  cuerpoModal.innerHTML += '<div class="datos"> <h4>Apellido Paterno:</h4> <p class="ap">' + apellidoPaterno + '</p> </div>';

  cuerpoModal.innerHTML += '<div class="datos"> <h4>Apellido Materno:</h4> <p class="am">' + apellidoMaterno + '</p> </div>';

  cuerpoModal.innerHTML += '<div class="datos"> <h4>Correo Electrónico:</h4> <p class="email">' + correoElectronico + '</p> </div>';

  if (identidadUsuario == 1) {
    let telefono = document.getElementById("tel").value;
    let numeroControl = document.getElementById("control").value;
    let rolUsuario = document.getElementById("rolEstudiante").value;
    let semestre = document.getElementById("semestre").value;

    cuerpoModal.innerHTML += '<div class="datos"> <h4>Tipo de registro:</h4> <p class="identidad">Estudiante</p> </div>';

    cuerpoModal.innerHTML += '<div class="datos"> <h4>Teléfono:</h4> <p class="tel">' + telefono + '</p> </div>';

    cuerpoModal.innerHTML += '<div class="datos"> <h4>Número de control:</h4> <p class="control">' + numeroControl + '</p> </div>';

    if (rolUsuario == 1) {
      cuerpoModal.innerHTML += '<div class="datos"> <h4>Rol:</h4> <p class="rol">Espectador</p> </div>';
    }
    else if (rolUsuario == 2) {
      cuerpoModal.innerHTML += '<div class="datos"> <h4>Rol:</h4> <p class="rol">Expositor</p> </div>';
    }

    cuerpoModal.innerHTML += '<div class="datos"> <h4>Semestre:</h4> <p class="semestre">' + semestre + '</p> </div>';
  }
  else if (identidadUsuario == 2) {
    let telefono = document.getElementById("tel").value;
    let tituloUsuario = document.getElementById("titulo").value;
    let funcionUsuario = document.getElementById("inputFuncion").value;
    let rfcUsuario = document.getElementById("rfc").value;

    cuerpoModal.innerHTML += '<div class="datos"> <h4>Tipo de registro:</h4> <p class="identidad">Docente</p> </div>';

    cuerpoModal.innerHTML += '<div class="datos"> <h4>Teléfono:</h4> <p class="tel">' + telefono + '</p> </div>';

    cuerpoModal.innerHTML += '<div class="datos"> <h4>Título:</h4> <p class="titulo">' + tituloUsuario + '</p> </div>';

    cuerpoModal.innerHTML += '<div class="datos"> <h4>Función:</h4> <p class="funcion">' + funcionUsuario + '</p> </div>';

    cuerpoModal.innerHTML += '<div class="datos"> <h4>RFC:</h4> <p class="rfc">' + rfcUsuario + '</p> </div>';
  }

  else if (identidadUsuario == 3) {
    let rolUsuario = document.getElementById("roles").value;
    let procedenciaUsuario = document.getElementById("lugar").value;

    cuerpoModal.innerHTML += '<div class="datos"> <h4>Tipo de registro:</h4> <p class="identidad">Externo</p> </div>';

    if (rolUsuario == 1) {
      cuerpoModal.innerHTML += '<div class="datos"> <h4>Rol:</h4> <p class="rol">Espectador</p> </div>';
    }
    else if (rolUsuario == 2) {
      cuerpoModal.innerHTML += '<div class="datos"> <h4>Rol:</h4> <p class="rol">Expositor</p> </div>';
    }
    else if (rolUsuario == 3) {
      cuerpoModal.innerHTML += '<div class="datos"> <h4>Rol:</h4> <p class="rol">Panelista</p> </div>';
    }
    else if (rolUsuario == 4) {
      cuerpoModal.innerHTML += '<div class="datos"> <h4>Rol:</h4> <p class="rol">Conferencista</p> </div>';
    }

    cuerpoModal.innerHTML += '<div class="datos"> <h4>Procedencia:</h4> <p class="procedencia">' + procedenciaUsuario + '</p> </div>';
  }
}

function limpiarModal() {
  let cuerpoModal = document.querySelector("#modal_container .modal");
  cuerpoModal.innerHTML = "";
  cuerpoModal.innerHTML = '<h2>Confirma que tus datos sean correctos</h2>'
}