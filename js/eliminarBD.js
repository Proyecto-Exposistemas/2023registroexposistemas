window.onload = () => {
    let boton = document.getElementById("botonEliminarBd");
    boton.addEventListener("click", () =>{
        //Pregunta en una alerta si desea eliminar la base de datos
        if(confirm("¿Desea eliminar la base de datos?")){
            //Pide que ingrese el siguiente codigo para confirmar la eliminacion
            let codigo = prompt("Ingrese el siguiente codigo para confirmar la eliminacion: REGISTRO-EXPOSISTEMAS");
            //Si el codigo es correcto, redirecciona a eliminarBD.php
            if(codigo == "REGISTRO-EXPOSISTEMAS"){
                
                let url = "../2023registroexposistemas/php/limpiar_bd.php";

                //Crea un fetch de tipo 205 para eliminar la base de datos
                fetch(url, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(data => {
                    alert('Base de datos eliminada con exito');
                    
                    location.reload();
                })
            }
        }
    })
}