import './App.css'
import Saludo from './components/Saludo'

function App() {

  return (
    <> {/*Significa un fragmento vacio. No dibuja un contenedor en el HTML */}
      <h1>Holiwis</h1>

      {/*Este es el primer componente, llamamos la function*/}
      <Saludo nombre='Rin' apellido = "Xuli"/>
    </>
  )
}

export default App

