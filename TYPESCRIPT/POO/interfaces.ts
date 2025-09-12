// Ejemplo de uso de INTERFACES en POO

// Ejemplo simple -> No es una estructura que usaríamos en un proyecto
class Animal { // Animal ya está en pilares.ts y Typescript lee las mismas variables en toda la carpeta, por eso dará error si se abre

    // ENCAPSULAMIENTO: Limitamos el acceso a nombre y especie
    private nombre: string;
    private especie: string;

    constructor(nombreParam: string, especieParam: string) {
        this.nombre = nombreParam;
        this.especie = especieParam;
    }

    comer(): string {
        return "Estoy comiendo"
    }

    getAnimal(): Animal {
        return this; // Retorna el this del nombre y el this de especie
    }

}


// Gracias a getAnimal podemos acceder al private e imprimir sus datos (nombre y especie)
let pet = new Animal("Mimi", "Gato");
console.log(pet.getAnimal());


// HERENCIA: Estamos usando este pilar por lo que se coloca extends
class Gato extends Animal implements IAnimal {

    //No hay ENCAPSULAMIENTO
    raza: string;
    color: string;

    constructor(nombreParam: string, especieParam: string, razaParam: string, colorParam: string) {
        super(nombreParam, especieParam);
        this.raza = razaParam;
        this.color = colorParam;

    }

    // Método, comportamiento de la clase (animal)
    hacerRuido(): string {
        return "Miau!"
    }
}


// Implements le avisa a JS y TS que la clase Perro OBLIGATORIAMENTE tiene que tener lo que declara IAnimal
class Perro extends Animal implements IAnimal {
    // Por esa razón sus atributos son los mismos, raza y color
    raza: string;
    color: string;

    // Método, comportamiento de la clase (animal)
    hacerRuido(): string {
        return "Guau!"
    }
}

// Se crea la Interface para mandarla a llamar cuando los animales tengan raza y color, es como un contrato
interface IAnimal {
    // Los ATRIBUTOS deben de quedar públicos
    raza: string; // Los private no se pueden aplicar a las interfaces
    color: string;

    // Los MÉTODOS deben de quedar públicos
    hacerRuido(): string;
}




