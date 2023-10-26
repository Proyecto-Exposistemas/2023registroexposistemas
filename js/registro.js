const boton_modal =  document.getElementById("confirmar_modal");
boton_modal.addEventListener("click",registrarAlumno);

//inputs de registro
const input_nombre = document.getElementById("nombre");
const input_apellido_paterno =  document.getElementById("ap");
const input_apellido_materno = document.getElementById("am");
const input_email = document.getElementById("email");
const input_telefono = document.getElementById("tel");
const input_noControl = document.getElementById("control");
const input_semestre = document.getElementById("semestre");
const input_titulo = document.getElementById("titulo");
const input_rfc = document.getElementById("rfc");
const input_lugar = document.getElementById("lugar");


function registrarAlumno(){

    let form = new FormData(document.getElementById('formulario'));
    fetch("php/Registro.php",
    {
        method: 'POST',
        body: form,
    })
    .then(response => response.json())
    .then(data => {
        data.error ?showAlert(data.mensaje,true,data.identificador):showAlert(data.mensaje,false,data.identificador);
        modal_container.classList.remove('show');
        limpiarModal();
    });

}

function showAlert(mensaje,error,identificador){
    Toastify({
        text: mensaje,
        duration: 1000,
        close: true,
        gravity: "top", // `top` or `bottom`
        position: "right", // `left`, `center` or `right`
        stopOnFocus: true, // Prevents dismissing of toast on hover
        style: {
            background: error?"linear-gradient(to right, #ff0000, #96c93d)" : "linear-gradient(to right, #00b09b, #96c93d)",
        },
        callback: function() {
            if(identificador !== "no hay"){
                limpiarCampos();
                if(identificador !== "registros_docentes;"){//si no es un docente le genera el codigo qr
                    window.open("codigo/imagen_qr.html?identificador="+encodeURIComponent(identificador), '_blank');
                }
            }
            
            Toastify.reposition();
        },
        close: true,
    }).showToast();
}

function limpiarCampos() {

    input_nombre.value = "";
    input_apellido_paterno.value = "";
    input_apellido_materno.value = "";
    input_email.value = "";
    input_telefono.value = "";
    input_noControl.value = ""
    input_semestre.value = "";
    input_titulo.value = "";
    input_rfc.value = "";
    input_lugar.value = "";
}