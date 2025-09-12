import './App.css'
import { ListCharacters } from './views/listCharacters/ListCharacters'
import { FavoritesDataProvider } from './contexts/FavoritesContext'
import { BrowserRouter, Link, Routes } from 'react-router'
import { Session } from './views/session/SessionView'
import { SearchCharacter } from './views/searchCharacter/SearchCharacter'

// Javascript SWC -> Speedy Web Compiler: Un compilador que traduce el código en la web de form rápida
// Promesa: La esperanza de una posible respuesta a eso que va a tardar.Tiene 3 estados(Funcionó, No funcionó, Pendiente)
//Asincronismo -> manejar código que tarda en completarse como solicitudes a un servidor o lectura

function App() {

  return (
    <>
      <FavoritesDataProvider>

        {/* Activamos React Router */}
        <BrowserRouter>
          <Navbar />
          <main className='container'>

            {/* Cuando tengamos React Router funcionando, Link es el sustituto de "a" para poner un enlace */}
            {/*<Link className='btn btn-success mb-2'>Register</Link>*/}
            <Routes>
              <Route path='/' element={<ListCharacters />} />{/*Crea una ruta hacia una nueva página, en este caso hacia la Page ListCharacters*/}
              <Route path='/session' element={<SessionView />} />
              <Route path='/search-character' element={<SearchCharacter />} />

            </Routes>
          </main>
        </BrowserRouter>



      </FavoritesDataProvider>



    </>
  )
}

export default App
