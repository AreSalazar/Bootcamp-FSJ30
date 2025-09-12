//rafc

import { LoginComponent } from "./components/loginComponent"
import { RegisterComponent } from "./components/RegisterComponent"

export const SessionView = () => {
const [typeForm, setTypeForm] = useState('login');

    return (
        <div className="row justfiy-content-center">
            
            <button className="btn btn-success col-1 m-2 p-2" onClick={() => {setTypeForm('register')}}>Sign Up</button>
            <button className="btn btn-primary col-1 m-2 p-2" onClick={() => {setTypeForm('login')}}>Sign In</button>
            
            {typeForm === 'login' ? <LoginComponent/> : <RegisterComponent/>} {/*SI typeForm es login entonces mostrará el Login, SINO muestra el Registro*/}
            <RegisterComponent />
            <LoginComponent/>
        </div>
    )
}
