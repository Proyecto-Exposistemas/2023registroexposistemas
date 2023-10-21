/* Formulario */
const formularioPassword = document.getElementById("form2");
formularioPassword.addEventListener("submit", enviarPass);

/* Inputs */
const passwordActual = document.getElementById("contraseña_anterior");
const passwordNueva = document.getElementById("nueva_contraseña");
const passwordConfirmar = document.getElementById("confirma_contraseña");

/* Botones */
const btnEnviar = document.getElementById("btn-guardarC");

function enviarPass(event){
    event.preventDefault();
    console.log("Enviando formulario");

    let form = new FormData();
    form.append("passwordActual",passwordActual.value);
    form.append("passwordNueva",passwordNueva.value);
    form.append("passwordConfirmar",passwordConfirmar.value);

    fetch("PhpConsultas/passwords.php",{
        method: "POST",
        body: form
    }).then(response => response.json())
    .then(data => {
        alert(data.mensaje);
        /* console.log(data); */
    });
}