//formulario 
const formulario_tabla = document.getElementById("form1");
formulario_tabla.addEventListener("submit", EnviarDatos);
//boton de buscar
const boton_buscar = document.getElementById("btn-buscar");
boton_buscar.addEventListener("click", BuscarDatos);
//boton eliminar
const boton_eliminar = document.getElementById("btn-eliminar");
boton_eliminar.addEventListener("click", EliminarDatos);
//boton de actualizar
const boton_actualizar = document.getElementById("btn-actualizar");
boton_actualizar.addEventListener("click", ActualizarDatos);
//inputs de la interfaz administrador para el registro del evento
const numero_evento = document.getElementById("NumeroActividad");
const nombre = document.getElementById("NombreActividad");
const descripcion = document.getElementById("temaActividad");
const materia = document.getElementById("Materia");
const hora_inicio = document.getElementById("HoraInicio");
const hora_final = document.getElementById("HoraFinal");
/* Funcion archivos */
fetch("PhpConsultas/prueba.php", {
  method: "POST"
}, true).then(response => response.json())
  .then(data => {

    cajas(data.nombre_completo_Exponentes, data.no_control_Exponentes, data.nombre_completo_docentes, data.rfc_docentes);
    
  });

  var listaNombres = [];
  var listaNumeros = [];
  var listaContador = [];

  var listaNombresAsesores = [];
  var listaRfcAsesores = [];
  var listaContadorAsesores = [];

function cajas(nombre_completo, numeros_control, nombre_completo_asesores, rfc_asesores) {
  

  var contenedor = document.querySelector('.options-container');
  var contenedor2 = document.querySelector('.options-container2');
  for (var i = 0; i < nombre_completo.length; i++) {
    contenedor.innerHTML += '<div class=\"option\" style=\"display: block;\"> <input type=\"radio\" class=\"radio\" id=\"' + numeros_control[i] + '\" name=\"expositoresParticipantes\" > <label for=\"' + numeros_control[i] + '\"id=\"etiqueta\" >' + nombre_completo[i] + '</label> </div>';
  }

  for (var j = 0; j < nombre_completo_asesores.length; j++) {
    contenedor2.innerHTML += '<div class=\"option2\" style=\"display: block;\"> <input type=\"radio\" class=\"radio\" id=\"' + rfc_asesores[j] + '\" name=\"asesoresParticipantes\" > <label for=\"' + rfc_asesores[j] + '\"id=\"etiqueta\" >' + nombre_completo_asesores[j] + '</label> </div>';
  }

  /* Seccion para mandar los datos a la lista lateral y eliminarlos */
  var nombre_completo2 = nombre_completo;
  var numeros_control2 = numeros_control;
  var nombre_completo_asesores2 = nombre_completo_asesores;
  var rfc_asesores2 = rfc_asesores;

  var listaOpciones = document.querySelectorAll('.option');
  var listaOpciones2 = document.querySelectorAll('.option2');

  var nombresLista = document.querySelector('.containerP');
  var nombresLista2 = document.querySelector('.container2P');

  /* Seccion de los estudiantes */
  listaOpciones.forEach(o => {
    o.addEventListener('click', (e) => {
      var valorTexto = (e.target.textContent).trim();

      /* Si el valor del texto es diferente de vacio, entonces */
      if (valorTexto != '') {

        if (listaNombres.includes(valorTexto) == false) {

          /* Agrega el valor al arreglo */
          listaNombres.push(valorTexto);

          var posicion_numero = 0

          for (var i = 0; i < nombre_completo2.length; i++) {
            if (nombre_completo2[i] == valorTexto) {
              posicion_numero = i;
            }
          }

          /* Agrega el valor al arreglo */
          listaNumeros.push(numeros_control2[posicion_numero]);

          /* cuenta los elementos de la lista */
          var contador = listaNombres.length;

          /* Agrega el valor al div */
          nombresLista.innerHTML += '<div class=\"nombres\" id=\"contenedor' + contador + '\"> <p class=\"nombreExpoenente\">' + valorTexto + '</p> <button class=\"btnEliminar\" type\"submit\" name=\"btnEliminar' + contador + '\" onClick=eliminar(\"contenedor' + contador + '\")><ion-icon name=\"backspace-outline\" class=\"iconoBoton\"></ion-icon></button> </div>';

          /* Agregar a listaContador */
          listaContador.push('contenedor' + contador);

         
        }else {
          alert('El nombre ya existe en la lista');
        }
        
      }
    });
    /* Guardar los arreglos en variables que sirvan para php */

  });

  /* Sección de los asesores */
  listaOpciones2.forEach(h => {
    h.addEventListener('click', (E) => {
      var valorTexto3 = (E.target.textContent).trim();

      /* Si el valor del texto es diferente de vacio, entonces */
      if (valorTexto3 != '') {

        if (listaNombresAsesores.includes(valorTexto3) == false) {
          /* Agrega el valor al arreglo */
          listaNombresAsesores.push(valorTexto3);

          var posicion_numero2 = 0

          for (var i = 0; i < nombre_completo_asesores2.length; i++) {
            if (nombre_completo_asesores2[i] == valorTexto3) {
              posicion_numero2 = i;
            }
          }

          /* Agrega el valor al arreglo */
          listaRfcAsesores.push(rfc_asesores2[posicion_numero2]);

          /* cuenta los elementos de la lista */
          var contador2 = listaNombresAsesores.length;

          /* Agrega el valor al div */
          nombresLista2.innerHTML += '<div class=\"nombres\" id=\"contenedor2' + contador2 + '\"> <p class=\"nombreAsistente\">' + valorTexto3 + '</p> <button class=\"btnEliminar\" type\"submit\" name=\"btn2Eliminar' + contador2 + '\" onClick=eliminar(\"contenedor2' + contador2 + '\")><ion-icon name=\"backspace-outline\" class=\"iconoBoton\"></ion-icon></button> </div>';

          /* Agregar a listaContador */
          listaContadorAsesores.push('contenedor2' + contador2);
          
        }else {
            alert('El nombre ya existe en la lista');
        }
      }

    });
  });



  /* Funcionalidad de los selectbox */
  const selected = document.querySelector(".selected")
  const selected2 = document.querySelector(".selected2")

  const optionsContainer = document.querySelector(".options-container")
  const optionsContainer2 = document.querySelector(".options-container2")

  const searchBox = document.querySelector(".search-box input")
  const searchBox2 = document.querySelector(".search-box2 input")

  const optionsList = document.querySelectorAll(".option")
  const optionsList2 = document.querySelectorAll(".option2")

  /* Primer selectbox */
  selected.addEventListener("click", () => {
    optionsContainer.classList.toggle("active");

    searchBox.value = "";
    filterList("");

    if (optionsContainer.classList.contains("active")) {
      searchBox.focus();
    }
  });

  optionsList.forEach(o => {
    o.addEventListener("click", () => {
      selected.innerHTML = o.querySelector("label").innerHTML;
      optionsContainer.classList.remove("active");
    });
  });

  searchBox.addEventListener("keyup", function (e) {
    filterList(e.target.value);
  });

  const filterList = searchTerm => {
    searchTerm = searchTerm.toLowerCase();
    optionsList.forEach(option => {
      var label = option.firstElementChild.nextElementSibling.innerText.toLowerCase();
      if (label.indexOf(searchTerm) != -1) {
        option.style.display = "block";
      } else {
        option.style.display = "none";
      }
    });
  };

  /* Segundo selectbox */
  selected2.addEventListener("click", () => {
    optionsContainer2.classList.toggle("active");

    searchBox2.value = "";
    filterList("");

    if (optionsContainer2.classList.contains("active")) {
      searchBox2.focus();
    }
  });

  optionsList2.forEach(o => {
    o.addEventListener("click", () => {
      selected2.innerHTML = o.querySelector("label").innerHTML;
      optionsContainer2.classList.remove("active");
    });
  });

  searchBox2.addEventListener("keyup", function (e) {
    filterList2(e.target.value);
  });

  const filterList2 = searchTerm => {
    searchTerm = searchTerm.toLowerCase();
    optionsList2.forEach(option => {
      var label = option.firstElementChild.nextElementSibling.innerText.toLowerCase();
      if (label.indexOf(searchTerm) != -1) {
        option.style.display = "block";
      } else {
        option.style.display = "none";
      }
    });
  };
}

function eliminar(id) {
  document.getElementById(id).remove();

  console.log('El id es: ' + id);

  /* Eliminación de los campos de manera correcta en la lista */
  for (var i = 0; i < listaContador.length; i++) {
    if (listaContador[i] == id) {
      listaNumeros.splice(i, 1);
      listaNombres.splice(i, 1);
      listaContador.splice(i, 1);
    }
  }

  for (var i = 0; i < listaContadorAsesores.length; i++) {
    if (listaContadorAsesores[i] == id) {
      listaNombresAsesores.splice(i, 1);
      listaRfcAsesores.splice(i, 1);
      listaContadorAsesores.splice(i, 1);
    }
  }

  /* Imprime los arreglos */
  console.log('Lista de nombres despues de eliminar: ' + listaNombres);
  console.log('Lista de ncontrol despues de eliminar: ' + listaNumeros);
  console.log('Lista de contador1 despues de eliminar: ' + listaContador);
  console.log('Lista de nombres asesores despues de eliminar: ' + listaNombresAsesores);
  console.log('Lista de rfc asesores despues de eliminar: ' + listaRfcAsesores);
  console.log('Lista de contador2 despues de eliminar: ' + listaContadorAsesores);
  
}

function EnviarDatos(event){
  event.preventDefault();

  if(listaNumeros.length == 0 || listaRfcAsesores.length == 0){
    showAlert("Debe elegir asesores y alumnos",true)
    
  }else{
    /* almacenar los datos de los arreglos */
    var formularioDatos = new FormData(formulario_tabla);

    listaNumeros.forEach(alumno=>{
      formularioDatos.append("Alumnos[]",alumno);
    });

    listaRfcAsesores.forEach(maestro=>{
      formularioDatos.append("Maestros[]",maestro);
    });
    
    

    fetch("PhpConsultas/insertarDatos.php", {
      method: "POST",
      body: formularioDatos
    }).then(response => response.json())
    .then(data =>{
      
      if(data.error == false){
        Limpiar_arreglos();
        Limpiar_contenedores();
        Limpiar_inputs();
      }
      data.error ?showAlert(data.mensaje,true):showAlert(data.mensaje,false);
    });
  }

  
}

function BuscarDatos(){
  
    /* almacenar los datos de los arreglos */
    var formularioDatos = new FormData(formulario_tabla);
    

    fetch("PhpConsultas/buscarDatos.php", {
      method: "POST",
      body: formularioDatos
    }).then(response => response.json())
    .then(data =>{

        if (data.mensaje == null) {
          Establecer_datos(data.evento, data.alumnos,data.alumnos_llaves,data.mestros, data.maestros_llaves);
        } else {

          data.error ?showAlert(data.mensaje,true):showAlert(data.mensaje,false);
        }
        
    });
  
}

function Establecer_datos(lista_evento,lista_alumnos,lista_alumnos_llaves, lista_maestros, lista_maestros_llaves) {
  if(lista_evento.length == 6){
    nombre.value = lista_evento[1];
    descripcion.value = lista_evento[4];
    
    materia.value = lista_evento[5];
    hora_inicio.value = lista_evento[2];
    hora_final.value = lista_evento[3];
  }

  Limpiar_arreglos();
  //limpia los ontenedores
  const nombresLista = document.querySelector('.containerP');
  const nombresLista2 = document.querySelector('.container2P');

  Limpiar_contenedores()

  for (let i = 0; i < lista_alumnos.length; i++) {

    listaNombres.push(lista_alumnos[i]);
    listaNumeros.push(lista_alumnos_llaves[i]);

    var contador = listaNombres.length;
    /* Agrega el valor al div */
    nombresLista.innerHTML += '<div class=\"nombres\" id=\"contenedor' + contador + '\"> <p class=\"nombreExpoenente\">' + lista_alumnos[i].trim() + '</p> <button class=\"btnEliminar\" type\"button\" name=\"btnEliminar' + contador + '\" onClick=eliminar(\"contenedor' + contador + '\")><ion-icon name=\"backspace-outline\" class=\"iconoBoton\"></ion-icon></button> </div>';

    /* Agregar a listaContador */
    listaContador.push('contenedor' + contador);

  }

  for (let j = 0; j < lista_maestros .length; j++) {

    listaNombresAsesores.push(lista_maestros[j]);
    listaRfcAsesores.push(lista_maestros_llaves[j]);

    var contador2 = listaNombresAsesores.length;
  
    nombresLista2.innerHTML += '<div class=\"nombres\" id=\"contenedor2' + contador2 + '\"> <p class=\"nombreAsistente\">' + lista_maestros[j].trim() + '</p> <button class=\"btnEliminar\" type\"button\" name=\"btn2Eliminar' + contador2 + '\" onClick=eliminar(\"contenedor2' + contador2 + '\")><ion-icon name=\"backspace-outline\" class=\"iconoBoton\"></ion-icon></button> </div>';

    /* Agregar a listaContador */
    listaContadorAsesores.push('contenedor2' + contador2);

  }


}

function EliminarDatos() {
  /* almacenar los datos de los arreglos */
  var formularioDatos = new FormData(formulario_tabla);
    

  fetch("PhpConsultas/eliminarDatos.php", {
    method: "POST",
    body: formularioDatos
  }).then(response => response.json())
  .then(data =>{
    if(data.error == false){
      Limpiar_arreglos();
      Limpiar_contenedores();
      Limpiar_inputs();
    }
    data.error ?showAlert(data.mensaje,true):showAlert(data.mensaje,false);
      
  });
}

function ActualizarDatos(){

  if(listaNumeros.length == 0 || listaRfcAsesores.length == 0){
    showAlert("Debe elegir asesores y alumnos",true)
    
  }else{
    /* almacenar los datos de los arreglos */
    var formularioDatos = new FormData(formulario_tabla);

    listaNumeros.forEach(alumno=>{
      formularioDatos.append("Alumnos[]",alumno);
    });

    listaRfcAsesores.forEach(maestro=>{
      formularioDatos.append("Maestros[]",maestro);
    });
    
    

    fetch("PhpConsultas/actualizarDatos.php", {
      method: "POST",
      body: formularioDatos
    }).then(response => response.json())
    .then(data =>{
      
      if(data.error == false){
        Limpiar_arreglos();
        Limpiar_contenedores();
        Limpiar_inputs();
      }
      data.error ?showAlert(data.mensaje,true):showAlert(data.mensaje,false);
    });
  }

  
}
function Limpiar_inputs() {
  numero_evento.value = "";
  nombre.value = "";
  descripcion.value = "";
  materia.value = "";
  hora_inicio.value = "";
  hora_final.value = "";
}

function Limpiar_contenedores() {
  const nombresLista = document.querySelector('.containerP');
  const nombresLista2 = document.querySelector('.container2P');

  nombresLista.replaceChildren();
  nombresLista2.replaceChildren();
}
function Limpiar_arreglos() {
  while(listaNombres.length > 0) {
    listaNombres.pop();
  }
  while(listaNumeros.length > 0) {
    listaNumeros.pop();
  }

  while(listaContador.length > 0) {
    listaContador.pop();
  }
  while(listaNombresAsesores.length > 0) {
    listaNombresAsesores.pop();
  }

  while(listaRfcAsesores.length > 0) {
    listaRfcAsesores.pop();
  }
  while(listaContadorAsesores.length > 0) {
    listaContadorAsesores.pop();
  }
}

//alertas
function showAlert(mensaje,error){
  Toastify({
      text: mensaje,
      duration: 1500,
      close: true,
      gravity: "top", // `top` or `bottom`
      position: "center", // `left`, `center` or `right`
      stopOnFocus: true, // Prevents dismissing of toast on hover
      style: {
        background: error?"linear-gradient(to right, #ff0000, #96c93d)" : "linear-gradient(to right, #00b09b, #96c93d)",
      }
    }).showToast();
}
  

