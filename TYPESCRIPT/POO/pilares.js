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
-- Herencia
-- Poliformismo

-- Encapsulamiento -> Limitar el acceso a la información
    Modificadores de acceso: Public, Protected, Private, Default = Public
-- Abstracción -> Nos da herramientas(métodos) para acceder a información limitada
*/
var Animal = /** @class */ (function () {
    // Constructor
    function Animal(especieParam, edadParam, generoParam, colorParam) {
        this.especie = especieParam;
        this.edad = edadParam;
        this.genero = generoParam;
        this.color = colorParam;
    }
    // MÉTODOS -> Son funciones que van a pertenecer a una clase -> Comportamiento
    Animal.prototype.comer = function () {
        return "Estoy comiendo";
    };
    // ABSTRACCIÓN, de esta manera accedemos a información limitada o privada
    // Getters y Setters
    Animal.prototype.getEdad = function () {
        return this.edad;
    };
    Animal.prototype.setEdad = function (edadParam) {
        this.edad = edadParam;
    };
    // Sigue siendo abstracción, ya que accedemos a información limitada, es decir privada
    Animal.prototype.aumentarEdad = function () {
        this.edad += 1;
    };
    return Animal;
}());
var animalito = new Animal("Chucho", 18, "Masculino", "Blanco");
console.log(animalito.especie); //imprimiendo solo un atributo del objeto creado en base/instanciado de una clase
//console.log(animalito.edad); // Tira error si le ponemos privado
console.log(animalito.getEdad());
