<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //REGISTRO DE USUARIO
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
                    'rol_id'      => 'required|integer',
                    'manager_id'  => 'required|integer',
                    'Fname'       => 'required|alpha',
                    'Lname'       => 'required|alpha',
                    'Email'       => 'required|email|unique:users', // Comprobar si el usuario existe (unique->tabla)
                    'Area'        => 'required|alpha',
                    'Pass'        => 'required|alpha_num',
                    'Cargo'       => 'required'                    
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
                    $pwd = hash("sha256", $params_array["Pass"]);

                    // Crear usuario                      
                    $user = new User();
                    $user->rol_id = $params_array['rol_id'];
                    $user->manager_id = $params_array['manager_id'];
                    $user->Fname = $params_array['Fname'];
                    $user->Lname = $params_array['Lname'];
                    $user->Email = $params_array['Email'];
                    $user->Area = $params_array['Area'];
                    $user->Pass = $pwd;
                    $user->ForgotPass = "";
                    $user->Cargo = $params_array['Cargo'];                                       
                    
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
                'Email'     => 'required|email', // Comprobar si el usuario existe (unique->tabla)
                'Pass'  => 'required'
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
                $pwd = hash("sha256", $params->Pass);                    

                // Regresar datos o token
                $signup = $JwtAuth->signup($params->Email, $pwd);

                if(!empty($params->gettoken)){
                    $signup = $JwtAuth->signup($params->Email, $pwd, true);
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
