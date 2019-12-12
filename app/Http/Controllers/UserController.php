<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    // REGISTRO DE USUARIO
    // --------------------------------------------->
    public function register(Request $request){

            // Recoger los datos por POST
            $json = $request->input("json", null);
            $params_array = json_decode($json, true);

            if(!empty($params_array)){
                // Limpiar los datos
                $params_array = array_map("trim", $params_array);

                // Validar datos
                $validate = \Validator::make($params_array, [
                    'name'     => 'required|alpha_dash',
                    'gender'   => 'required|alpha',
                    'email'    => 'required|email|unique:users', // Comprobar si el usuario existe (unique->tabla)
                    'user'     => 'required|alpha_dash|unique:users',
                    'password' => 'required|alpha_dash',
                ]);

                if($validate->fails()){
                    $data  = array(
                        'status' => 'error',
                        'code' => 404,
                        'message' => 'Los datos enviados no son correctos',
                        'errors' => $validate->errors()
                    );
                }else{
                    $data  = array(
                        'status' => 'success',
                        'code' => 200,
                        'message' => 'El usuario se ha creado correctamente'
                    );

                    // Cifrar la contraseña
                    $pwd = hash("sha256", $params_array["password"]);

                    // Crear usuario
                    $user = new User();
                    $user->name = $params_array['name'];
                    $user->gender = $params_array['gender'];
                    $user->email = $params_array['email'];
                    $user->user = $params_array['user'];
                    $user->password = $pwd;

                    // guardar el usuario
                    $user->save();
                }
            }else{
                $data  = array(
                    'status' => 'error',
                    'code' => 404,
                    'message' => 'Los datos enviados no son correctos'
                );
            }

        return response()->json($data, $data['code']);

    }

    //LOGIN DE USUARIO
    //-------------------------->
    public function login(Request $request){

        $JwtAuth = new \JwtAuth();

        // Recibir datos por POST

        $json = $request->input('json', null);
        $params = json_decode($json);
        $params_array = json_decode($json, true);

        if(!empty($params_array)){

            // Validar los datos
            $validate = \Validator::make($params_array, [
                'user'     => 'required|alpha_dash',
                'password'  => 'required|alpha_dash'
            ]);

            if($validate->fails()){
                $signup  = array(
                    'status' => 'error',
                    'code' => 404,
                    'message' => 'Los datos enviados no son correctos',
                    'errors' => $validate->errors()
                );
            }else{

                // Cifrar contraseña
                $pwd = hash("sha256", $params->password);

                // Regresar datos o token
                $signup = $JwtAuth->signup($params->user, $pwd);

                if(!empty($params->gettoken)){
                    $signup = $JwtAuth->signup($params->user, $pwd, true);
                }

            }

        }else{
            $signup  = array(
                'status' => 'error',
                'code' => 404,
                'message' => 'El usuario no se ha podido identificar'
            );
        }

        return response()->json($signup, 200);

    }

    //MOSTRAR INFO USUARIO
    //------------------------------------->
    public function show(Request $request){

        $token = $request->header('Autorization');
        $JwtAuth = new \JwtAuth;
        $checkToken = $JwtAuth->checkToken($token);

        if($checkToken){

            $userData = $JwtAuth->checkToken($token,true);
            $users = User::findOrFail($userData->sub);

            $show  = array(
                'status' => 'success',
                'code' => 200,
                'users' => $users
            );

        }else{

            $show  = array(
                'status' => 'error',
                'code' => 404,
                'message' => 'El Token es invalido'
            );

        }

        return response()->json($show, $show['code']);

    }

    //ACTUALIZAR INFORMACION USUARIO
    //------------------------------------->
    public function updated(Request $request){

        $token = $request->header('Autorization');
        $JwtAuth = new \JwtAuth;
        $checkToken = $JwtAuth->checkToken($token);

        if($checkToken){
            $userData = $JwtAuth->checkToken($token,true);
            // Recoger los datos por POST
            $json = $request->input("json", null);
            $params_array = json_decode($json, true);

            if(!empty($params_array)){
                //  Limpiar los datos
                $params_array = array_map("trim", $params_array);

                // Validar datos
                $validate = \Validator::make($params_array, [
                    'name'     => 'required|alpha_dash',
                    'gender'   => 'required|alpha',
                    'email'    => 'required|email',
                    'user'     => 'required|alpha_dash',
                    'password' => 'alpha_dash',
                ]);

                if($validate->fails()){

                    $update  = array(
                        'status' => 'error',
                        'code' => 404,
                        'message' => 'Verifique los datos',
                        'errors' => $validate->errors()
                    );

                }else{

                    //OBTENER EL ID POR EL TOKEN
                    $user = User::findOrFail($userData->sub);
                    $user->name = $params_array['name'];
                    $user->gender = $params_array['gender'];
                    $user->email = $params_array['email'];
                    $user->user = $params_array['user'];

                    $user->save();

                    $update  = array(
                        'status' => 'success',
                        'code' => 200,
                        'message' => 'El usuario se ha actualizado',
                        'user' => $user
                    );

                }

            }else{

                $update  = array(
                    'status' => 'error',
                    'code' => 404,
                    'message' => 'Los datos enviados no son correctos'
                );

            }

        }else{
            $update  = array(
                'status' => 'error',
                'code' => 404,
                'message' => 'El Token es invalido'
            );
        }

        return response()->json($update, $update["code"]);

    }


}
