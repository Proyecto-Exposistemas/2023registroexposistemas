let identidad = document.getElementById("identidad");

let inputRolEstudiante = document.getElementById("cajaRolEstudiante");
let inputIdentidad = document.getElementById("cajaIdentidad");
let inputRol = document.getElementById("cajaRoles")
let inputTelefono = document.getElementById("cajaTelefono")
let inputNumeroControl = document.getElementById("cajaNumeroControl")
let inputSemestre = document.getElementById("cajaSemestre")
let inputTitulo = document.getElementById("cajaTitulo")
let inputRfc = document.getElementById("cajaRfc")
let inputProcedencia = document.getElementById("cajaProcedencia")
let inputFuncion = document.getElementById("cajaFuncion")

let botonEnviar = document.getElementById("enviar")

let circulo = document.getElementById("circulo")

identidad.addEventListener("change", function() {
    seleccion = identidad.value

    if(seleccion == "1") {
        /* Código para los campos del alumno */
        inputRol.style.display = "none"
        inputTelefono.style.display = "grid"
        inputNumeroControl.style.display = "grid"
        inputSemestre.style.display = "grid"
        inputTitulo.style.display = "none"
        inputRfc.style.display = "none"
        inputProcedencia.style.display = "none"
        inputFuncion.style.display = "none"
        inputRolEstudiante.style.display = "grid"


    }
    else if(seleccion == "2") {
        /* Código para los campos del profesor */
        inputRol.style.display = "none"
        inputTelefono.style.display = "grid"
        inputNumeroControl.style.display = "none"
        inputSemestre.style.display = "none"
        inputTitulo.style.display = "grid"
        inputRfc.style.display = "grid"
        inputProcedencia.style.display = "none"
        inputFuncion.style.display = "grid"
        inputRolEstudiante.style.display = "none"


    }
    else if(seleccion == "3") {
        /* Código para los campos del extenro */
        inputRol.style.display = "grid"
        inputTelefono.style.display = "none"
        inputNumeroControl.style.display = "none"
        inputSemestre.style.display = "none"
        inputTitulo.style.display = "none"
        inputRfc.style.display = "none"
        inputProcedencia.style.display = "grid"
        inputFuncion.style.display = "none"
        inputRolEstudiante.style.display = "none"

        let opcionesRol = document.getElementById("roles")

        opcionesRol.addEventListener("change", function() { 
            seleccionRol = opcionesRol.value

            if(seleccionRol == "3") {
                inputTitulo.style.display = "grid"
            }
            else if(seleccionRol == "4") {
                inputTitulo.style.display = "grid"
            }
            else if(seleccionRol == "2") {
                inputTitulo.style.display = "grid"
            }
            else {
                inputTitulo.style.display = "none"
            }
        })
    }
})

