var b1=false;
var b2=false;
var b3=false;
var b4=false;
var b5=false;
var b6=false;
var b7=false;
var b8=false;
var b9=false;
var b10=false;
var b11=false;


const expresiones = {

    alumnos:/^Z[\d]{8}$/,
    semestre:/^[\d]{1}$/,
    codigo:/^[\d]{5}$/,
    maestros:/^RH[\d]{3}$/,  
    rfc:/^[a-zA-Z0-9]{12,13}$/,
    telefono:/^[\d]{10}$/,
    secretaria:/^RH[\d]{3}$/,  
    nom:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ]{3,30}$/,
    apellido:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ]{3,15}$/,
    colonia:/^([a-zA-Z0-9áéíóúÁÉÍÓÚñÑ]{4,10})+$/,
    estado:/^(^[a-zA-ZáéíóúÁÉÍÓÚñÑ]{4,20})+$/,
    titulo:/^([a-zA-Z]{20})+$/,
    municipio:/^([a-zA-ZáéíóúÁÉÍÓÚñÑ]{4,25})+$/,
    //calle:/^(^[\w\WáéíóúÁÉÍÓÚñÑ]{5,30})+$/,
    //calle:/^(^[a-zA-ZáéíóúÁÉÍÓÚñÑ]{5,30})+$/,
    calle:/^(^[a-zA-Z0-9#áéíóúÁÉÍÓÚñÑ ]{5,30})+$/,
    password: /^[\w\W]{8,16}$/,
    //correo:/^(([a-zA-ZáéíóúÁÉÍÓÚñÑ][a-zA-Z0-9áéíóúÁÉÍÓÚñÑ\_]{1,30}))+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/,
    correo:/^(([a-zA-ZáéíóúÁÉÍÓÚñÑ][a-zA-Z0-9áéíóúÁÉÍÓÚñÑ\_]{1,30}))+\@(([a-zA-Z])+\.)+([a-zA-Z]{2,4})+$/,
}


const nombre = document.getElementById('nombre');
nombre.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    nombre.value = valorinput.replace(/[^a-zA-ZáéíóúÁÉÍÓÚñÑ ]/g, ''); 
    if (expresiones.nom.test(valorinput.replace(/\s/g, '').trim() )) {
        b1 = true;
        validar();
    }
    else {
        b1 = false;
        validar();
    } 
});


const ap = document.getElementById('ap');
ap.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    ap.value = valorinput.replace(/[^a-zA-ZáéíóúÁÉÍÓÚñÑ]/g, '').trim(); 
    if (expresiones.apellido.test(valorinput.replace(/\s/g, '').trim() )) {
        b2 = true;
        validar();
    }
    else {
        b2 = false;
        validar();
    }  
});
const am = document.getElementById('am');
am.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    am.value = valorinput.replace(/[^a-zA-ZáéíóúÁÉÍÓÚñÑ]/g, '').trim();  
    if (expresiones.apellido.test(valorinput.replace(/\s/g, '').trim() )) {
        b3 = true;
        validar();
    }
    else {
        b3 = false;
        validar();
    } 
});

const tel = document.getElementById('tel');
tel.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    tel.value = valorinput.replace(/[^0-9]/g, '').trim();

    if (tel.value.length > 10) {
        tel.value = tel.value.slice(0, 10);
    }
    if (expresiones.telefono.test(valorinput.replace(/\s/g, '').trim() )) {
        b4 = true;
        validar();
    }
    else {
        b4 = false;
        validar();
    } 
});

const control= document.getElementById('control');
control.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    control.value = valorinput.replace(/[^a-zA-Z0-9áéíóúÁÉÍÓÚñÑ]/g, '').trim(); 
    if (expresiones.alumnos.test(valorinput.replace(/\s/g, '').trim() )) {
        b5 = true;
        validar();
    }
    else {
        b5 = false;
        validar();
    } 
});

const semestre = document.getElementById('semestre');
semestre.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    semestre.value = valorinput.replace(/[^1-9]/g, '').trim();

    if (semestre.value.length > 1) {
        semestre.value = semestre.value.slice(0, 1);
    }
    if (expresiones.semestre.test(valorinput.replace(/\s/g, '').trim() )) {
        b8 = true;
        validar();
    }
    else {
        b8 = false;
        validar();
    } 
});
const email = document.getElementById('email');
email.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    email.value = valorinput.replace(/[^a-zA-Z0-9@.]/g, '').trim();
    if (expresiones.correo.test(valorinput.replace(/\s/g, '').trim() )) {
        b6 = true;
        validar();
    }
    else {
        b6 = false;
        validar();
    } 
});
const funcion = document.getElementById('funcion');
funcion.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    funcion.value = valorinput.replace(/[^a-zA-ZáéíóúÁÉÍÓÚñÑ]/g, '').trim(); 
    if (expresiones.nom.test(valorinput.replace(/\s/g, '').trim() )) {
        b7 = true;
        validar();
    }
    else {
        b7 = false;
        validar();
    } 
});

const titulo = document.getElementById('titulo');
titulo.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    titulo.value = valorinput.replace(/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/g, '').trim();
    if (expresiones.nom.test(valorinput.replace(/\s/g, '').trim() )) {
        b10 = true;
        validar();
    }
    else {
        b10 = false;
        validar();
    } 
});
const rfc = document.getElementById('rfc');
rfc.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    rfc.value = valorinput.replace(/[^A-Z0-9]/g, '').trim();
    if (expresiones.rfc.test(valorinput.replace(/\s/g, '').trim() )) {
        b9 = true;
        validar();
    }
    else {
        b9 = false;
        validar();
    } 
});
const lugar = document.getElementById('lugar');
lugar.addEventListener('keyup', (e) => {
    let valorinput = e.target.value;
    console.log(valorinput);
    lugar.value = valorinput.replace(/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/g, '');
    if (expresiones.nom.test(valorinput.replace(/\s/g, '').trim() )) {
        b11 = true;
        validar();
    }
    else {
        b11 = false;
        validar();
    } 
});


function validar() {
    const bot = document.getElementById('btn');
    console.log(b1);
    console.log(b2);
    console.log(b3);
    console.log(b4);
    console.log(b5);
    console.log(b6);
    console.log(b7);
    console.log(b8);
    console.log(b9);
    console.log(b10);
    console.log(b11);
    if(b1 == true && b2 == true && b3 == true && b5 == true && b6 == true && b7 == true && b8 == true && b9 == true && b10 == true && b11 == true){
        bot.disabled=false;
    }
    else{
        bot.disabled=true;
    }
}