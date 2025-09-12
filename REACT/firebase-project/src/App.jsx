
import LoginComponent from './views/login/LoginComponent'
import { Products } from './views/products/Products'
import { BrowserRouter } from 'react-router'
function App() {

  return (
    <div>
    <BrowserRouter>
      <h1>Holiwis</h1>
      <LoginComponent />
      <Products />
    </BrowserRouter>
    </div>
  )
}

export default App
