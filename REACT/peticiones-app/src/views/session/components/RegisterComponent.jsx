//rafc
import { useForm } from 'react-hook-form'
import * as yup from 'yup'
import { yupResolver } from '@hookform/resolvers'
import { createUserWithEmailAndPassword } from 'firebase/auth'
import { auth } from '../../../repositories/firebase/config'

const schema = yup.object({ //Con yup creamos el objeto para las validaciones
  email: yup.string().email("Please enter a correct format: email.@gmail.com").required(),
  password: yup.string().required().min(8, "Please enter a min 8 char")
    .matches(/[A-Z]/, 'Please enter a 1 char in Mayus')//Valida que tenga al menos un mayúscula
    .matches(/[a-z]/, 'Please enter a 1 char in Minus')//Valida que tenga al menos una minúscula
    .matches(/[0-9]/, 'Please enter a 1 char in Number')//Valida que tenga un número
    .matches(/[!@#$%&*?.,_:<>|]/, 'Please enter a 1 char in Special Char'),//Permite que tengan de estos carácteres
  confirm_password: yup.string().oneOf([yup.ref("password"), null], 'Check our password')
})

export const RegisterComponent = () => {
  //Retorna métodos
  const { register, handleSubmit, formSate: { errors } } = useForm({ //formSate es para mostrar todos los errores que pueden haber
    resolver: yupResolver(schema)
  })
  /*const [email,setEmail] = useState("");
  const [password,setPassword] = useState("");

  const handleSubmit = (e) => {
    e.preventDefault();
    console.log(e.target);
    console.log(e.target.input_email.value);
    console.log(e.target.input_password.value);

    console.log(email);
    console.log(password);
  }*/
  const onSubmitForm = (data) => {
    console.log(data);

    //Importado de firebase documentación -> authentification/Web/Autenticación de contraseña
    createUserWithEmailAndPassword(auth, data.email, data.password)
      .then((userCredential) => {
        // Signed up 
        const user = userCredential.user;
        console.log(user)

        alert('User succesfully registration')
      })
      .catch((error) => {
        const errorCode = error.code;
        const errorMessage = error.message;
        console.log(errorCode);
        console.log(errorMessage);

      });
    //-------------------------------------------------------

  }

  return (
    <section className='row justifify-content-center'>
      <div className='col-6'>
        <div className='card'>
          <div className='card-body'>
            <h3 className='card-title text-center'>Sign Up</h3>

            <form onSubmit={handleSubmit(onSubmitForm)}>

              <label className="form-label" >Email: </label>
              <input type="email" className="form-control" name="input_email" {...register('email')} />
              <p className='text-danger'>{errors.email && errors.email.message}</p>{/*Si da TRUE lo muestra */}
              <label className="form-label">Password: </label>
              <input type="password" className="form-control" name="input-password" {...register('password')} />
              <p className='text-danger'>{errors.password && errors.password.message}</p>{/*Si da TRUE lo muestra */}
              <label className="form-label">Confirm Password: </label>
              <input type="password" className="form-control" {...register('confirm_password')} />
              <p className='text-danger'>{errors.confirm_password && errors.confirm_password.message}</p>{/*Si da TRUE lo muestra */}

              <button type="submit">Send</button>

            </form>
          </div>
        </div>
      </div>
    </section>
  )
}
