//botones de descarga
const alumnos_boton = document.getElementById("alumnos");
const docentes_boton = document.getElementById("docentes");
const externos_boton = document.getElementById("externos");

//formularios
const formulario = document.getElementById("formulario");
formulario.addEventListener("submit", SubirArchivo); 

const formulario_generar = document.getElementById("formulario_generar");
formulario_generar.addEventListener("submit", GenerarArchivo); 

//inputs
const input_plantilla = document.getElementById("plantilla");
//divs
const div_informacion = document.getElementById("informacion");

Archivos();


function SubirArchivo(event) {

    event.preventDefault();
    let form = new FormData();

    form.append("file", input_plantilla.files[0]);

    fetch("../php/Subir_archivo.php",{
        method: "POST",
        body: form
    }).then(response => response.json())
    .then(data => {
        data.error ?showAlert(data.mensaje,true):showAlert(data.mensaje,false);
        
    });
}

function GenerarArchivo(event) {

    event.preventDefault();
    let form = new FormData();
    form.append("generar",true);

    fetch("../php/Generar_constancias.php",{
        method: "POST",
        body: form
    }).then(response => response.json())
    .then(data => {
        data.error ?showAlert(data.mensaje,true):showAlert(data.mensaje,false);
        if(data.error == false){
            MostrarBotones();
        }
        
    });
} 

/**
 * @function MostrarBotones muestra los botones de descarga de las constancias
 */
function MostrarBotones() {
    alumnos_boton.hidden = false;
    docentes_boton.hidden = false;
    externos_boton.hidden = false;
    
}


/**
 * It checks if the user has a template and/or certificates uploaded, and if so, it displays a message.
 */
function Archivos() {
    fetch("../php/comprobar_archivos.php",{
        method: "POST"
    },true).then(response => response.json())
    .then(data => {
        if(data.template){
            const info_existencia = document.createElement("p");
            info_existencia.innerHTML = "Ya tiene una plantilla cargada";
            /* info_existencia.style = "float:left;"; */
            div_informacion.appendChild(info_existencia);
        }
        if(data.constancias){
            const info_existencia2 = document.createElement("p");
            info_existencia2.innerHTML = "Ya tiene unas constancias generadas";
            /* info_existencia2.style = "float:right;"; */
            div_informacion.appendChild(info_existencia2);
            MostrarBotones();
        
        }

        
        
    });
}


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
        },
        close: true
      }).showToast();
}