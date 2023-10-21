let listaNombres = ['Alejandro Gordo Barajas', 'Leobardo Miramontes Murillo', 'Luis Fernando Valdez Mota']
let listaNumeros = ['Z20020142', 'Z20020064', 'Z20020098'];

/* Declara una variable de entrada para pedir la posicion */
let posicion = 2;

/* Elimina la posicion de ambos arreglos */
listaNombres.splice(posicion, 1);
listaNumeros.splice(posicion, 1);

/* Imprime los arreglos */
console.log(listaNombres);
console.log(listaNumeros);
