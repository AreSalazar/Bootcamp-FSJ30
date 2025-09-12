//Paradigma -> modelo de programar

// Que programamos bajo unas reglas en específico
// Código reutilizable
// Se basa en  el uso de objetos y clases para organizar y estructurar el código
// Es un paradigma que está orientada a clases y objetos

/*
    POO -> Es una forma de ver y pensar el código y las soluciones de implementaciones de software
    Vamos a imaginar moldes para poder estandarizar las cosas -> CLASES
    Utilizar los moldes para crear funcionalidad en nuestra app-> OBJETOS
*/

/* PILARES DE POO o OOP
-- Herencia -> Obtiene las características del Padre
-- Poliformismo -> Después de obtener los comportamientos del Padre, podemos cambiar el funcionamiento de esos comportamientos 

-- Encapsulamiento -> Limitar el acceso a la información
    Modificadores de acceso: Public, Protected, Private, Default = Public
-- Abstracción -> Nos da herramientas(métodos) para acceder a información limitada
*/

class Animal {

    // Atributos o propiedades -> Características de esta clase
    public especie: string;
    private edad: number;
    genero: string;
    color: string;

    // Constructor
    constructor(especieParam: string, edadParam: number, generoParam: string, colorParam: string) {
        this.especie = especieParam;
        this.edad = edadParam;
        this.genero = generoParam;
        this.color = colorParam;
    }

    // MÉTODOS -> Son funciones que van a pertenecer a una clase, es decir un Comportamiento
    // En este caso un perro come
    comer(): string {
        return "Estoy comiendo";
    }

    // ABSTRACCIÓN, de esta manera accedemos a información limitada o privada
    // Getters y Setters

    //Get: devolver datos desde la clase hacia fuera
    getEdad(): number {
        return this.edad;
    }
    //Set: recibir datos desde fuera y guardarlos dentro de la clase
    setEdad(edadParam: number) {
        this.edad = edadParam;
    }
    // Sigue siendo abstracción, ya que accedemos a información limitada, es decir privada
    aumentarEdad() {
        this.edad += 1;
    }
}

const animalito = new Animal("Chucho", 18, "Masculino", "Blanco");



console.log(animalito.especie); //imprimiendo solo un atributo del objeto creado en base/instanciado de una clase
//console.log(animalito.edad); // Tira error si le ponemos privado
console.log(animalito.getEdad());




// HERENCIA = se usa para agregar más funcionalidad al PADRE
class Perro extends Animal { // Perro es hijo de Animal
    // Se agregar 2 nuevos atributos HIJO más los del padre
    private raza: string;
    private nombre: string;

    constructor(especieParam: string, edadParam: number, generoParam: string, colorParam: string, razaParam: string, nombreParam: string) {
        //Traemos la FUNCIONALIDAD del constructor del PADRE
        super(especieParam, edadParam, generoParam, colorParam)
        this.raza = razaParam;
        this.nombre = nombreParam;
    }

    ladrar(): string { // Recordar poner el tipo a retornar (string) en TS
        return "Wau re wau";
    }

    //POLIMORFISMO
    aumentarEdad(): void {
        this.setEdad(this.getEdad() + 7); // Cambia la edad, se le aumentan 7 años más
    }
}

const perrito = new Perro("Perro", 5, "Masculino", "Marrón", "Aguacatero", "Firulais");



// Tipo personalizado
type User = {
    name: string,
    email: string,
    password: string,
    rol: string
}

let usuarito: User = {
    name: "Andrea",
    email: "andrea@gmail.com",
    password: "12345678",
    rol: "admin"
}

// Esta parte se usa mucho en el frontend
interface IUser {
    name: string,
    email: string,
    password: string,
    rol: string

    login():string;
}

let usuarito2: IUser = {
    name: "Andrea",
    email: "andrea@gmail.com",
    password: "12345678",
    rol: "admin",
    login() {
        return "Me loguee"
    },
}
