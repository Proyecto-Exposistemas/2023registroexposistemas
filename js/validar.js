let flagNombre = false;
let flagPaterno = true;
let flagMaterno = false;
let flagCorreo = true;
let flagIdentidad = false;
let flagTelefono = false;
let flagNumeroControl = true;
let flagSemestre = false;
let flagTitulo = false;
let flagFuncion = false;
let flagRfc = false;
let flagProcedencia = false;

const boton = document.getElementById('open');

const expresiones = {
    alumnos: /^Z[\d]{8}$/,
    semestre: /^[\d]{1}$/,
    codigo: /^[\d]{5}$/,
    maestros: /^RH[\d]{3}$/,
    rfc: /^[a-zA-Z0-9]{12,13}$/,
    telefono: /^[\d]{10}$/,
    secretaria: /^RH[\d]{3}$/,
    nom: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ.]{3,100}$/,
    apellido: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ]{3,15}$/,
    colonia: /^([a-zA-Z0-9áéíóúÁÉÍÓÚñÑ]{4,10})+$/,
    estado: /^(^[a-zA-ZáéíóúÁÉÍÓÚñÑ]{4,20})+$/,
    titulo: /^([a-zA-Z]{20})+$/,
    municipio: /^([a-zA-ZáéíóúÁÉÍÓÚñÑ]{4,25})+$/,
    //calle:/^(^[\w\WáéíóúÁÉÍÓÚñÑ]{5,30})+$/,
    //calle:/^(^[a-zA-ZáéíóúÁÉÍÓÚñÑ]{5,30})+$/,
    calle: /^(^[a-zA-Z0-9#áéíóúÁÉÍÓÚñÑ ]{5,30})+$/,
    password: /^[\w\W]{8,16}$/,
    //correo:/^(([a-zA-ZáéíóúÁÉÍÓÚñÑ][a-zA-Z0-9áéíóúÁÉÍÓÚñÑ\_]{1,30}))+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/,
    //correo: /^(([a-zA-ZáéíóúÁÉÍÓÚñÑ][a-zA-Z0-9áéíóúÁÉÍÓÚñÑ.\_]{1,100}))+\@(([a-zA-Z])+\.)+([a-zA-Z]{2,4})+$/,
    correo:/^([a-zA-ZáéíóúÁÉÍÓÚñÑ][a-zA-Z0-9áéíóúÁÉÍÓÚñÑ.\_]+)\@([a-zA-Z]+)\.([a-zA-Z]{2,})$/
    
}

/* VALIDACIONES PARA LOS NOMBRES */
const nombre = document.getElementById('nombre');
nombre.addEventListener('keyup', (e) => {

    console.log("Se disparó el evento del nombre");

    let valorinput = e.target.value;

    nombre.value = valorinput.replace(/[^a-zA-ZáéíóúÁÉÍÓÚñÑ. ]/g, '');

    if (expresiones.nom.test(valorinput.replace(/\s/g, '').trim())) {
        flagNombre = true;
        validar();
    }

    else {
        flagNombre = true;
        validar();
    }

});

/* VALIDACIONES PARA EL APELLIDO PATERNO */
const ap = document.getElementById('ap');
ap.addEventListener('keyup', (e) => {

    console.log("Se disparó el evento del apellido paterno");

    let valorinput = e.target.value;

    ap.value = valorinput.replace(/[^a-zA-ZáéíóúÁÉÍÓÚñÑ ]/g, '');

    if (expresiones.apellido.test(valorinput.replace(/\s/g, ''))) {
        flagPaterno = true;
        validar();
    }

    else {
        flagPaterno = true;
        validar();
    }

});

/* VALIDACIONES PARA EL APELLIDO MATERNO */
const am = document.getElementById('am');
am.addEventListener('keyup', (e) => {

    console.log("Se disparó el evento del apellido materno");


    let valorinput = e.target.value;

    am.value = valorinput.replace(/[^a-zA-ZáéíóúÁÉÍÓÚñÑ ]/g, '');

    if (expresiones.apellido.test(valorinput.replace(/\s/g, '').trim())) {
        flagMaterno = true;
        validar();
    }

    else {
        flagMaterno = true;
        validar();
    }

});

/* VALIDACIONES PARA EL CORREO */
const emailCaja = document.getElementById('email');
emailCaja.addEventListener('keyup', (e) => {

    console.log("Se disparó el evento del correo");


    let valorinput = e.target.value;

    emailCaja.value = valorinput.replace(/[^a-zA-Z0-9@áéíóúÁÉÍÓÚñÑ._-]/g, '').trim();
    console.log(valorinput);
    if (expresiones.correo.test(valorinput.replace(/\s/g, '').trim())) {
        flagCorreo = true;
        validar();
    }
    else {
        flagCorreo = true;
        validar();
    }
});

/* VALIDACIONES PARA LA IDENTIDAD */
const identidadValidacion = document.getElementById('identidad');
identidadValidacion.addEventListener('change', (e) => {

    console.log("Se disparó el evento de la identidad");


    let valorinput = e.target.value;

    if(valorinput != '0'){
        flagIdentidad = true;
        validar();
    }
    else{
        flagIdentidad = false;
        validar();
    }
});

/* VALIDACIONES PARA EL TELEFONO */
const tel = document.getElementById('tel');
tel.addEventListener('keyup', (e) => {

    console.log("Se disparó el evento del telefono");


    let valorinput = e.target.value;
    tel.value = valorinput.replace(/[^0-9]/g, '').trim();
    console.log("Se dispara el evento");
    if (tel.value.length > 10) {
        tel.value = tel.value.slice(0, 10);
    }

    if (expresiones.telefono.test(valorinput.replace(/\s/g, '').trim())) {
        flagTelefono = true;
        validar();
    }

    else {
        if (tel.value.length == 10) {
            flagTelefono = true;
            validar();
        }else{
        flagTelefono = false;
        validar();
            }    }
});

/* VALIDACIONES PARA EL NUMERO DE CONTROL */
const control = document.getElementById('control');
control.addEventListener('keyup', (e) => {

    console.log("Se disparó el evento del numero de control");


    let valorinput = e.target.value;

    control.value = valorinput.replace(/[^a-zA-Z0-9áéíóúÁÉÍÓÚñÑ]/g, '').trim();
    if (expresiones.alumnos.test(valorinput.replace(/\s/g, '').trim())) {
        flagNumeroControl = true;
        validar();
    }

    else {
        flagNumeroControl = true;
        validar();
    }
});

/* VALIDACIONES PARA EL SEMESTRE */
const semestre = document.getElementById('semestre');
semestre.addEventListener('keyup', (e) => {

    console.log("Se disparó el evento del semestre");

    let valorinput = e.target.value;
    
    semestre.value = valorinput.replace(/[^1-9]/g, '').trim();

    if (semestre.value.length > 1) {
        semestre.value = semestre.value.slice(0, 1);
    }
    if (expresiones.semestre.test(valorinput.replace(/\s/g, '').trim())) {
        flagSemestre = true;
        validar();
    }
    else {
        flagSemestre = false;
        validar();
    }
});

/* VALIDACIONES PARA LA FUNCION */
const funcion = document.getElementById('inputFuncion');
funcion.addEventListener('change', (e) => {

    console.log("Se disparó el evento de la funcion");

    seleccion = e.target.value;

    if (seleccion != '0') {
        flagFuncion = true;
        validar();
    }
    else {
        flagFuncion = false;
        validar();
    }
});

/* VALIDACIONES PARA EL TITULO */
const titulo = document.getElementById('titulo');
titulo.addEventListener('keyup', (e) => {

    console.log("Se disparó el evento del titulo");

    let valorinput = e.target.value;
    
    titulo.value = valorinput.replace(/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/g, '');
    if (expresiones.nom.test(valorinput.replace(/\s/g, ''))) {
        flagTitulo = true;
        validar();
    }
    else {
        flagTitulo = false;
        validar();
    }
});

/* VALIDACIONES PARA EL RFC */
const rfc = document.getElementById('rfc');
rfc.addEventListener('keyup', (e) => {

    console.log("Se disparó el evento del rfc");

    let valorinput = e.target.value;

    rfc.value = valorinput.replace(/[^a-zA-Z0-9]/g, '').trim();
    
    if (rfc.value.length > 13) {
        rfc.value = rfc.value.slice(0, 13);
    }
    if (expresiones.rfc.test(valorinput.replace(/\s/g, '').trim())) {
        flagRfc = true;
        validar();
    }
    else {
        flagRfc = false;
        validar();
    }
});

/* VALIDACIONES PARA EL LUGAR DE PROCEDENCIA */
const lugar = document.getElementById('lugar');
lugar.addEventListener('keyup', (e) => {

    console.log("Se disparó el evento del lugar");

    let valorinput = e.target.value;

    lugar.value = valorinput.replace(/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/g, '');
    if (expresiones.nom.test(valorinput.replace(/\s/g, '').trim())) {
        flagProcedencia = true;
        validar();
    }

    else {
        flagProcedencia = true;
        validar();
    }
});


function validar() {
    console.log("Valor de la variable flagNombre: " + flagNombre);
    console.log("Valor de la variable flagPaterno: " + flagPaterno);
    console.log("Valor de la variable flagMaterno: " + flagMaterno);
    console.log("Valor de la variable flagCorreo: " + flagCorreo);

    if(flagNombre == true && flagPaterno == true && flagCorreo == true ){
        condicional = identidadValidacion.value;

        console.log("El valor de la variable condicional es: " + condicional);
        console.log("");

        if(condicional == '1'){
            console.log("Valor de la variable flagIdentidad: " + flagIdentidad);
            console.log("Valor de la variable flagTelefono: " + flagTelefono);
            console.log("Valor de la variable flagNumeroControl: " + flagNumeroControl);
            console.log("Valor de la variable flagSemestre: " + flagSemestre);

            if(flagTelefono == true && flagNumeroControl == true && flagSemestre == true){
                boton.disabled = false;
                console.log("El boton esta habilitado");
                console.log("");
            }
            else{
                boton.disabled = true;
                console.log("El boton esta deshabilitado");
                console.log("");
            }
        }

        else if(condicional == '2'){
            console.log("EL valor de la variable boleana funcion es: " + flagFuncion);
            console.log("El valor de la variable boleana titulo es: " + flagTitulo);
            console.log("El valor de la variable boleana rfc es: " + flagRfc);
            console.log("El valor de la variable boleana telefono es: " + flagTelefono);
            console.log("");

            if(flagFuncion == true && flagTitulo == true && flagRfc == true && flagTelefono == true){
                boton.disabled = false;
                console.log("El boton esta habilitado");
                console.log("");
            }
            else{
                boton.disabled = true;
                console.log("El boton esta deshabilitado");
                console.log("");
            }
        }

        else if(condicional == '3'){
            console.log("El valor de la variable procedencia es: " + flagProcedencia);
            console.log("");

            if(flagProcedencia == true){
                boton.disabled = false;
                console.log("El boton esta habilitado");
            }
            else{
                boton.disabled = true;
                console.log("El boton esta deshabilitado");
            }
        }
    }
}
