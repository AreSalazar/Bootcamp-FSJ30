let cursoCarrito = [];
const contenedorCarrito = document.getElementById('cuerpo-carrito'); // para guardar los productos del carrito

// Funcionalidad del botón CARRITO -> VACIAR CARRITO
function vaciarCarrito(evento) {
    console.log("Soy el vaaciar carrito");


    cursoCarrito = [];
    contenedorCarrito.innerHTML = ""; // Funcionalidad para eliminar el carrito
}


//-------------------------------------------------------------------------------------------------------------------------------------
// Funcionalidad del botón AGREGAR AL CARRITO
function agregarCurso(evento) {
    console.log("Soy el agregar curso");
    // .target Sirve para ver el código del botón donde se encuentra el agregarCurso
    //console.log(evento.target.parentElement.parentElement); // Con parentElement aumenta el alcance de los elementos del código, es decir que se puede ver hasta el div card-body 
    // Y si le agrego otro .parentElement puedo leer más, hasta el article card

    let curso = leerDatosCurso(evento.target.parentElement.parentElement);
    console.log(curso);


    // Sirve para no repetir el producto sino sumarlo en el carrito en caso que el producto ya esté agregado 
    // Chequeamos si el curso existe previamente y guardamos true o false
    const existe = cursoCarrito.some((cursoArr) => cursoArr.id == curso.id) // some sirve para boleanos, es decir que retorna true o false

    if (existe) { // Se puede poner == ó === es lo mismo
        cursoCarrito.map((cursoArr) => {
            if (cursoArr.id === curso.id) {
                cursoArr.cantidad += 1;

                //Aumentar precio
                // Utilizar un método de string que pueda quitar el primer caracter
                // Métodos posibles = Substring o Slice para quitarle el signo $, el primer caracter de un string
                cursoArr.precio = cursoArr.precio.substring(1); // substring Le quita el primer caracter ($) a ese string

                // Transformamos el string a número
                // Puedes usar parseInt o parseFloat
                cursoArr.precio = parseFloat(cursoArr.precio);
                // Una vez transformado, ahora se suman los productos agregados
                cursoArr.precio += parseFloat(curso.precio.substring(1)); // curso.precio.substring(1) obtiene el valor actual del nuevo curso al agregarlo (sin el $)

                // Devolvemos el precio a su formato original (string)
                cursoArr.precio = `$${cursoArr.precio}`;

                // Tarea: resolver la suma de los precios, no es correcta

                return cursoArr;
            }
        })
    } else {
        // Funcionalidad del botón CARRITO
        cursoCarrito.push(curso);
    }

    console.log(cursoCarrito);


    pintarCarritoHTML(); // Se llama a la funcion pintarCarritoHTML para que agregarCurso lo muestre
}

function leerDatosCurso(curso) {
    console.log(curso); // Buena práctica: a cada función se le agrega un console.log para testear, es decir para ver qué tenemos de la función a cada rato

    // Con querySelector busca y muestra solo el <img> del leerDatosCurso(evento.target.parentElement.parentElement); 
    console.log(curso.querySelector('a').getAttribute('data-id'));
    console.log(curso.querySelector('img').src); // Con src me muestra solo el link de la imagen
    console.log(curso.querySelector('h4').textContent); // Muestra solo el h4. Con textContent muestra el contenido de los h4 y h5
    console.log(curso.querySelector('h5').textContent); // Muestra solo el h5

    const infoCurso = {
        id: curso.querySelector('a').getAttribute('data-id'), // .getAttribute('data-id) es porque JS lee el guión como menos, por eso se coloca getAttribute
        imagen: curso.querySelector('img').src,
        nombre: curso.querySelector('h4').textContent,
        precio: curso.querySelector('h5').textContent,
        cantidad: 1
    }

    return infoCurso;

}



function pintarCarritoHTML() {
    //contenedorCarrito.innerHTML = "<h1>Holiwis</h1>"

    // Limpiar el HTML del carrito antes de mapear los datos
    contenedorCarrito.innerHTML = ""

    cursoCarrito.map((curso) => {

        //Crear una fila
        let fila = document.createElement('tr'); //tr es fila, createElement('tr') Crea na fila

        // Asignar los valores en celdas
        // td es para crear una celda
        fila.innerHTML = ` 
        <td><img src="${curso.imagen}" width="95"/></td> 
        <td>${curso.nombre}</td>
        <td>${curso.precio}</td>
        <td>${curso.cantidad}</td>
        <td><a class="btn btn-danger" onclick="eliminarCurso('${curso.id}')">Eliminar</a></td>
        `// Se usa el template literal (comillas invertidas) para poder insertar variables directamente dentro del HTML con ${...}

        contenedorCarrito.appendChild(fila);
    })
}
//pintarCarritoHTML();

function eliminarCurso(id) {
    console.log(id);

    // Si tiene cantidad mayor a uno, tiene que descontarse de 1 en 1 y no eliminar todos los productos de un solo

    cursoCarrito = cursoCarrito.map((curso) => { //cursoCarrito.map sirve para recorrer el array y crea un nuevo arreglo modificado
        // Guarda los cursos que sean diferentes a ese ID
        if (curso.id == id) {
            curso.cantidad -= 1; // Se le resta uno al apretar el botón Eliminar

            // Se reecalculan el precio unitario
            // Calcula el precio por unidad, dividiendo el precio total entre la cantidad anterior (por eso se usa +1, ya que ya restamos 1 antes)
            const precioUnitario = parseFloat(curso.precio.substring(1)) / (curso.cantidad + 1); //substring(1) elimina el símbolo $
            //Calcula el nuevo precio total multiplicando el precio unitario por la nueva cantidad
            curso.precio = `$${(precioUnitario * curso.cantidad).toFixed(2)}`; // Y de paso se le agregar el simbolo $
        }
        return curso;

    })
        .filter(curso => curso.cantidad > 0); // Si la cantidad llegó a 0, se elimina del carrito gracias al .filter()

    // reflejar los cambios
    pintarCarritoHTML();
}