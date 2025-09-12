import { useForm } from 'react-hook-form'
import * as yup from 'yup'
import { yupResolver } from '@hookform/resolvers'
import { createUserWithEmailAndPassword } from 'firebase/auth'
import { auth } from '../../../repositories/firebase/config'

const schema = yup.object({ //Con yup creamos el objeto para las validaciones
    email: yup.string().email("Please enter a correct format: email.@gmail.com").required(),
    password: yup.string().required().min(8, "Please enter a min 8 char")
})

export const LoginComponent = () => {
    const { register, handleSubmit, formState: { errors } } = useForm({
        resolver: yupResolver(schema) //El resolver es el cómo para validar
    });

    const onSubmitForm = (data) => {
        //Código sacado de firebase.google => Documentos/Authentication/Web/Autenticación de contraseña
        signInWithEmailAndPassword(auth, email, password)
            .then((userCredential) => {
                // Signed in 
                const user = userCredential.user;
                // ...
            })
            .catch((error) => {
                const errorCode = error.code;
                const errorMessage = error.message;
            });
        //---------------------------------------------------------- */
    }

    return (
        <section className='row justifify-content-center'>
            <div className='col-6'>
                <div className='card'>
                    <div className='card-body'>
                        <h3 className='card-title text-center'>Sign In</h3>

                        <form onSubmit={handleSubmit(onSubmitForm)}>

                            <label className="form-label" >Email: </label>
                            <input type="email" className="form-control" name="input_email" {...register('email')} />
                            <p className='text-danger'>{errors.email && errors.email.message}</p>{/*Si da TRUE lo muestra */}
                            <label className="form-label">Password: </label>
                            <input type="password" className="form-control" name="input-password" {...register('password')} />
                            <p className='text-danger'>{errors.password && errors.password.message}</p>{/*Si da TRUE lo muestra */}

                            <button type="submit">Send</button>

                        </form>
                    </div>
                </div>
            </div>
        </section>
    )
}