/**
 * muestra los campos a llenar en el generador aux de manera dinamica
 * y establece el metodo para el envio del formulario
 */
const formulario = document.getElementById("formularioQR");
formulario.addEventListener("submit",comprobarRegistroAnterior);

const qrImg = document.getElementById("qr_imagen");
const contenedor_informacion = document.getElementById("informacion");

let roles_externos = document.getElementById("roles");
let identidad = document.getElementById("identidad");
let nControl = document.getElementById("cajaNumeroControl");
let correo = document.getElementById("cajaCorreo");


let circulo=document.getElementById("circulo");
let botonEnviar = document.getElementById("enviar");

nControl.style.display = "none";
correo.style.display = "none";
roles_externos.style.display = "none";

identidad.addEventListener("change", function(){
    seleccion = identidad.value;
    if(seleccion == "0"){
        nControl.style.display = "none";
        correo.style.display = "none";
        roles_externos.style.display = "none";
    }
    else if(seleccion == "1"){
        nControl.style.display = "grid";
        correo.style.display = "none";
        roles_externos.style.display = "none";
    }
    else if(seleccion == "2"){
        nControl.style.display = "none";
        roles_externos.style.display = "grid";
        correo.style.display = "grid";
    }
})



function comprobarRegistroAnterior(event) {
    
    event.preventDefault();
    let form = new FormData(formulario);

    fetch("../php/peticion_codigo_aux.php",{
        method: "POST",
        body: form
    }).then(response => response.json())
    .then(data =>{

        if(data.existe){
            //si el registro existe entonces que genere el qr

            GenerarQR(data.identificador);
        }
        showAlert(data.mensaje,data.error);
    });
}
//genera el qr con los datos dados
function GenerarQR(identificador) {
    
    contenedor_informacion.style.display = "block";
    qrImg.style.display = "block";
    qrImg.src = `https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=${identificador}`;

}
//alertas
function showAlert(mensaje,error){
    Toastify({
        text: mensaje,
        duration: 2000,
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
