//Para correr el npm run dev hay que verificar en qué carpeta está el package.json

import { useState } from "react";
import { Chauchis } from "./Chauchis";

// CREAR nuestro primer componente

// Props -> Propiedades
function Saludo({ nombre, apellido }) { //Se coloca el {} para la Props
  //function Saludo(props){
  // console.log(props);

  /* Destructuring object
  const {nombre,apellido} = props
  */

  let curso = "FSJ30";

  //El reemplazo de las variables para manipular datos en REACT
  //El ESTADO -> Hook: Funciones PREHECHAS que ya vienen con React
  //Si queremos cambiar algo a la vista, usamos ESTADOS
  const [nombreCurso, setNombreCurso] = useState("FSJ30");



  return (<>
    <h1>Holiwis, {nombre} {apellido}</h1>
    <h2>Curso: {nombreCurso}</h2>
    <button onClick={() => setNombreCurso("Java30")}>Magia</button> {/*Cambiar de FSJ30 a Java30 */}
    <button onClick={() => setNombreCurso("FSJ30")}>Regresar</button>
    <br />
    <Chauchis nombre = {nombre} curso = {nombreCurso}/>
  </>)
}

export default Saludo;

