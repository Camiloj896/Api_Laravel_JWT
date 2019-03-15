<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //REFISTRO DE USUARIO
    //--------------------------
    public function register(Request $request){
        
        // Recoger los datos por POST
            
            $json = $request->input("json", null);            
            $params_array = json_decode($json, true);
        
            if(!empty($params_array)){

                //  Limpiar los datos

                $params_array = array_map("trim", $params_array);

                // Validar datos
    
                $validate = \Validator::make($params_array, [
                    'name'      => 'required|alpha',
                    'surname'   => 'required|alpha',
                    'email'     => 'required|email|unique:users', // Comprobar si el usuario existe (unique->tabla)
                    'password'  => 'required'
                ]);

                if($validate->fails()){
                    $data  = array(
                        'status' => 'error',
                        'code' => 404,
                        'message' => 'El usuario no se ha creado',
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
                    $user->surname = $params_array['surname'];
                    $user->email = $params_array['email'];
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
    //--------------------------
    public function login(Request $request){

        $JwtAuth = new \JwtAuth();

        // Recibir datos por POST

        $json = $request->input('json', null);
        $params = json_decode($json); 
        $params_array = json_decode($json, true);        
        
        if(!empty($params_array)){                  
            
            // Validar los datos

            $validate = \Validator::make($params_array, [
                'email'     => 'required|email', // Comprobar si el usuario existe (unique->tabla)
                'password'  => 'required'
            ]);

            if($validate->fails()){
                $signup  = array(
                    'status' => 'error',
                    'code' => 404,
                    'message' => 'El usuario no se ha podido identificar',
                    'errors' => $validate->errors()
                );  
            }else{

                // Cifrar contraseña
                $pwd = hash("sha256", $params->password);                    

                // Regresar datos o token
                $signup = $JwtAuth->signup($params->email, $pwd);

                if(!empty($params->gettoken)){
                    $signup = $JwtAuth->signup($params->email, $pwd, true);
                }
                
            }

        }else{
            $signup  = array(
                'status' => 'error',
                'code' => 404,
                'message' => 'Los datos enviados no son correctos'                
            ); 
        }

        return response()->json($signup, 200);

    }

    public function updated(Request $reuqest){

        $token = $reuqest->header('Autorization');
        $JwtAuth = new \JwtAuth;
        $checkToken = $JwtAuth->checkToken($token);

        if($checkToken){
            echo "<h1>Login Correcto</h1>";
        }else{
            echo "<h1>Login Incorrecto</h1>";
        }

        die();

    }
}
