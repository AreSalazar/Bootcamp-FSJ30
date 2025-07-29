console.log("Holiwiiisss");

// Obtenemos un elemento de frontend (HTML)
let elementoDOM = document.getElementById('textoSaludo'); // Hacemos referencia al HTML, siempre se ocupará el document para ello. getElementById Obtiene solo un elemento, en este caso por medio del ID, se lo pusimos el h1 del index
console.log(elementoDOM);

let contenidoDOM = document.querySelector('#contenido'); // querySelecto Selecciona solo el primer elemento de una etiqueta, en este caso es una clase. querySelectorAll Selecciona todos los elementos de la clase
console.log(contenidoDOM); // querySelector y getElementById funcionan igual, pero con sintaxis diferente



const btnApretable = document.querySelector('#btnMagic'); // querySelector para el botón btnMagic

const btnArraycito = document.querySelector('#btnArraycito'); // querySelector para el botón btnArraycito


// Propiedades de los elementos
console.log(elementoDOM.innerHTML); // Obtiene todo el contenido HTML del elemento
console.log(elementoDOM.innerText); // Obtiene solo el texto del elemento

elementoDOM.innerHTML = "<h2>Chauchis</h2>" //Sustituye el ID textoSaludo. Prueba usar innetText y verás que incluye hasta el h2
contenidoDOM.innerHTML = "<h3>Este texto está inyectado con JS</h3>" // Sustituye el ID #contenido



// Métodos de los elementos
btnApretable.addEventListener('click',()=>{ // addEventListener es de los eventos más usados, se usa con callback
    alert('Avada Kedavra'); //Alert frena la ejecución de la página, hasta que se acepte el alert
    console.log("Fucionó el botón"); // Mensaje que aparece en Console después de aceptar el alert
    
    let dato = prompt("Ingresame tu nombre porfa"); // prompt es un Evento que se usa para ingresar datos del usuario
    console.log(dato);

    //Puede usarse para la tarea del DOM
    elementoDOM.style.color = "red"; // Cambiar color del Cauchics después de ingresar el nombre
    elementoDOM.style.fontFamily = "sans-serif"; // Cambiar letra del Cauchis después de ingresar el nombre
    elementoDOM.style.marginLeft = "2rem"; // Cambiar el margin después de ingresar el nombre
});



// Método de JS
// Almacenar datos en local para el usuario

let arraycito = [1,2,3];
console.log(arraycito);


// localStorage -> Almacenamiento local en el navegador del usaurio
// localStorage está diseñado para guardar OBJETOS, algo que funcione con clave valor
localStorage.setItem('arraycito',JSON.stringify(arraycito)); //JSON agarra cualquier dato para guardarlo y transformarlo en un JSON. stringify pasa de JS a JSON y luego lo convierte a STRING
let datita = localStorage.getItem('arraycito');

// MOstramos los datos del localStorage que SON UN STRING
console.log(datita);
// Devolver la data a su tipo original
let datitaArray = JSON.parse(datita);
console.log(datitaArray);


btnArraycito.addEventListener('click', ()=>{
    console.log("Estoy andando"); //Hacer click en el btn aparece este mensaje

    arraycito.push(4); // Agrega el número 4 al array
    console.log(arraycito); // Hacer click en el btn aparece el array con el número 4 agregado
})

