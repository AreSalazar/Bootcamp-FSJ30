<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth; //Y este va a chequear las credenciales deshasheándolo, sin que nosotros tengamos que hacerlo a manita
use Illuminate\Support\Facades\Hash; //Este va a hashear la contraseña
//use App\Http\Controllers\Exception;

class UserController extends Controller
{
    //
    public function register(Request $request)
    {
        try {
            //Validamos los datos del request o petición
            $request->validate([
                'name' => 'required|string|max:255|unique:users|alpha|min:8|regex:/^[A-Za-z]+$/',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8'
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password) //En la BD el password debe aparecer con caracteres aleatorios como $2y$12$dU0KCtwWcGgs, esto significa que está HASHEADO
            ]);

            return response()->json([
                'message' => 'User registered succesfully',
                'user' => $user,
                'status' => 201 //201 significa creado, que se hizo una creación exitosa
            ], 201);
        } catch (\Exception $error) { //Sin la fleca da error el Exception, pero funciona con la fleca, no hay problema
            return response()->json([
                'message' => 'Error registering user',
                'error' => $error->getMessage()
                //'status' => 400,
            ]);
        }
    }

    public function login(Request $request)
    {
        // Validamos los datos del request a la petición
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:8',
        ]);

        //Extaemos solo los datos que vamos a trabajar del body de la petición
        $credentials = $request->only('email', 'password');

        //Intentar autenticar al usuario con las credenciales
        //Auth::attempt devuelve true o flase, dependiendo si las credenciales son correctas
        if (Auth::attempt($credentials)) {
            //Si las credenciales funcionaron obtenemos el usuario
            $user = $request->user();
            //$user = Auth::user(); Esta es otra forma de hacerlo

            //Declaramos el tiempo de expiración del token
            $expiractionTimeToken = Carbon::now()->addMinutes(30);  


            //Generamos un token de acceso para el usuario autenticado
            //Un token es una encriptación que tiene dentro toda la información que determinemos, en este caso se usará para encriptar los datos del usuario
            //Ya solo con sanctum podemos hacer autenticaciones
            $token = $user->createToken('auth_token', ['server:update'],$expiractionTimeToken)->plainTextToken; //Para que se entienda el token lo pasamos a plainTextToken, osea tipo texto, para que lo entienda el frontend
            //['server:update'] indica que tenemos una actualización, como el token no tiene una fecha de expiración, entonces con la actualización le decimos el tiempo de expiración

            return response()->json([
                'message' => 'User logged succesfully',
                'user' => $user, //Lo pasamos solo para que lo veamos, no es necesario ponerlo en realidad
                'type_token' => 'Bearer',//Para postman
                'token' => $token,
                'status' => 200,
            ], 200);
        }
    }

    public function logout(Request $request){
        //Obtenemos el usuario logueado en este caso a través del request (no se pasa en el body) en el autorization
        $user = $request->user();

        //Revocamos ese token, hace que el token quede inválido y que el usuario tenga que generar otro nuevo
        $user->currentAccessToken()->delete();

        //Si Revocamos TODOS los tokens activos->sirve para cambios de contraseña o una funmcionalidad en específico
        //de cerrar todads las seciones del usuario entonces se usa:
        //$user->tokens()->delete

        return response()->json([
            'message' => 'User logged out successfuly',
            'status' => 200
        ], 200);
    }
}
