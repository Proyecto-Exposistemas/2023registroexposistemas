document.addEventListener("DOMContentLoaded",VerSesion);
/**
 * este codigo sirve para que, pasado cierto tiempo de inactividad, se cierre la session
 * para eso usamos el movimiento del raton, si no mueve el raton despues 
 * de que el tiempo se acabe, cierra la session
 */
expiracion_session = 1200;//su session expira en 20 minutos
const id = window.setInterval(function () {
    document.onmousemove = function () {
        //el onmouse es para detectar el movimiento del raton
        expiracion_session = 1200;//le da mas tiempo cada que mueve el raton, otros 20 minutos
    };
    expiracion_session--;//cada que no se mueva el mouse este va ir decrementado
    
    if (expiracion_session <= -1) {
        alert("La sesion expiro");
        location.href=" https://fabricaitszas.com/RegistroExposistemas/SesionesUsuario/logout.php";
    }
}, 1200);/** repetir cada 1.2 segundos */


function VerSesion() {

    fetch(" https://fabricaitszas.com/RegistroExposistemas/SesionesUsuario/user.php",{
        method: "POST"
    },true).then(response => response.json())
    .then(data => {
        if(data.dato == false){
            location.href=" https://fabricaitszas.com/RegistroExposistemas/SesionesUsuario/logout.php";
        }
    }
);
}
