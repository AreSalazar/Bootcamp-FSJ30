import { StrictMode } from 'react'
import { createRoot } from 'react-dom/client'
import './index.css'
import App from './App.jsx'

createRoot(document.getElementById('root')).render(
  <StrictMode>
    <App />
  </StrictMode>,
)

// Javascript SWC -> Speedy Web Compiler: Un compilador que traduce el código en la web de form rápida
// Promesa: La esperanza de una posible respuesta a eso que va a tardar.Tiene 3 estados(Funcionó, No funcionó, Pendiente)