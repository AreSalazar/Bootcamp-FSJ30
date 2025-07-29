// Peticiones asíncronas

/* LAS PROMESAS TIENEN 3 ESTADOS
    PENDING -> TODAVÍA NO HAY UNA RESPUESTA
    RESPONSE (Resolve) -> SI LA PROMESA SE CUMPLIÓ
    REJECT -> RECHAZA LA PROMESA, NO SE CUMPLIÓ

*/

console.log("Holiiii :3");

// Simular una petición a una API
//Para dar una respuesta se puede retornar o usar console log
function getCoach(id) {
    return new Promise((resolve, reject) => {
        setTimeout(() => { //Otro callback
            if (id === 1) {
                // Si la promesa se resuelve dará esto
                resolve({ id: 1, name: "Arthur" });
            } else {
                reject("No se encontró ese coach");
            }
        }, 2000) //Tiempo impuesto para que tarde en buscar los datos, por lo que saldrá PENDING, por andar de apurados
    })
}

//console.log(getCoach(1));

// Manejo de asincronismo o promesas

// No es necesario hacer funciones, solo es para que quede lindo
function traerDatos() {

    getCoach(1)
        //then es el hermano mayor, dá las buenas noticias, ejecuta cuando todo sale bien
        .then((data) => {
            console.log(data);
        })
        //catch es el hermano menor, quien dá la noticia de que hay errores
        .catch((error) => {
            console.log(error);
        });
}
//traerDatos();


// Async y await (Otra forma de lo anterior)
async function obtenerDatos() { //async: Declara que esta función es asíncrona, lo que significa que internamente puede usar await.
    try { //Sirve para intentar ejecutar el código que podría generar un error (por ejemplo, si la promesa es rechazada).
        let coach = await getCoach(2); //await:Espera a que la promesa que devuelve getCoach termine (resuelta o rechazada). Mientras espera, no bloquea todo el programa, sino que cede el control hasta que la promesa finalice.
        console.log(coach); //En este caso, como getCoach(2) se rechaza, esta línea no se ejecuta.
    } catch (error) {
        console.error(error); //Imprime el error en la consola como mensaje de error -> reject("No se encontró ese coach");
    }
}

//obtenerDatos();


// FETCH -> Va a ser nuestro método(interfaz) para hacer peticiones HTTP
async function getDittoAwait() {
    // Se le agrega try catch para el manejo de errores, es una buena práctica
    try {

        let respuesta = await fetch('https://pokeapi.co/api/v2/pokemon/ditto') // ESPERÁ A TRAER LA RESPUESTA
        console.log(respuesta); // Se hace console log seguido para ver la respuesta que nos dá la API
        
        let cuerpo = await respuesta.json(); // Obtenemos el CUERPO de esa respuesta anterior
        console.log(cuerpo); //MUESTRO EL CUERPO, ahí están los datos

    } catch (error) {
        console.error(error);
    }

}
getDittoAwait();

// Lo mismo pero con sintaxis DIFERENTE, ES LA MISMA RESPUESTA pero con then
async function getDittoThen() {
    // No usamos el TimeOut porque es asincrono, va a tardar en traer la info del link
    fetch('https://pokeapi.co/api/v2/pokemon/ditto') // Buscar los datos en la API

        .then((data) => { // Decimos a JS que espere a que vuelva con la respuesta
            console.log(data); // Nos va a dar los meta datos
            return data.json(); // Retornar la data para usarla después, SOLO EL BODY EN TIPO JSON
        })

        .then((data) => { // Voy a utilizar el body (data) que retorne antes 
            console.log(data); //MUESTRO EL CUERPO, ahí están los datos
        })

        .catch((error) => {
            console.log(error);
        })
}
getDittoThen();

// CONCLUSIÓN: Puedes usar Await o then, dará la misma respuesta pero diferente sintaxis


function saludar(){
    console.log("Holiwis");
}