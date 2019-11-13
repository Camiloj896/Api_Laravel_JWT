<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //REGISTRO DE USUARIO
    //-------------------------->
    public function register(Request $request){
        
        // Recoger los datos por POST            
            $json = $request->input("json", null);            
            $params_array = json_decode($json, true);
        
            if(!empty($params_array)){
                //  Limpiar los datos
                $params_array = array_map("trim", $params_array);

                // Validar datos    
                $validate = \Validator::make($params_array, [                    
                    'manager_id'  => 'required|integer',
                    'Fname'       => 'required|alpha',
                    'Lname'       => 'required|alpha',
                    'Email'       => 'required|email|unique:users', // Comprobar si el usuario existe (unique->tabla)
                    'Area'        => 'required|alpha',
                    'Pass'        => 'required|alpha_num',
                    'Cargo'       => 'required|alpha'                    
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
                    $user->rol_id = 7;
                    $user->manager_id = $params_array['manager_id'];
                    $user->Fname = $params_array['Fname'];
                    $user->Lname = $params_array['Lname'];
                    $user->Email = $params_array['Email'];
                    $user->Area = $params_array['Area'];
                    $user->Pass = $pwd;
                    $user->ForgotPass = "";
                    $user->Estado = "Activo";
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

    //MOSTRAR INFO USUARIO/USUARIOS
    //------------------------------------->
    public function show(Request $request, $id = null){

        $token = $request->header('Autorization');
        $JwtAuth = new \JwtAuth;
        $checkToken = $JwtAuth->checkToken($token);

        if($checkToken){

            if(isset($id)){
                $users = User::findOrFail($id);

                $show  = array(
                    'status' => 'success',
                    'code' => 200,
                    'users' => $users                
                );

            }else{
                $users = User::all()->where('Estado', 'Activo'); 
                
                $show  = array(
                    'status' => 'success',
                    'code' => 200,
                    'users' => $users                
                );               
            }
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
    public function updated(Request $request, $id = null){

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
                    'rol_id'      => 'integer',
                    'manager_id'  => 'integer',
                    'Fname'       => 'alpha',
                    'Lname'       => 'alpha',
                    'Email'       => 'email|unique:users', // Comprobar si el usuario existe (unique->tabla)
                    'Area'        => 'alpha',
                    'Pass'        => 'alpha_num',
                    'Cargo'       => 'alpha'                    
                ]);

                if($validate->fails()){

                    $update  = array(
                        'status' => 'error',
                        'code' => 404,
                        'message' => 'Verifique los datos',
                        'errors' => $validate->errors()
                    );  

                }else{

                    //VALIDAR SI EL ID
                    if(isset($id)){
                        $user = User::findOrFail($id);
                    }else{
                        //OBTENER EL ID POR EL TOKEN
                        $user = User::findOrFail($userData->sub);
                    }                    

                    if(isset($params_array['rol_id'])){ $user->rol_id = $params_array['rol_id']; }
                    if(isset($params_array['manager_id'])){ $user->manager_id = $params_array['manager_id']; }
                    if(isset($params_array['Fname'])){ $user->Fname = $params_array['Fname']; }
                    if(isset($params_array['Lname'])){ $user->Lname = $params_array['Lname']; }
                    if(isset($params_array['Email'])){ $user->Email = $params_array['Email']; }
                    if(isset($params_array['Area'])){ $user->Area = $params_array['Area']; }
                    if(isset($params_array['Pass'])){ $user->Pass = $params_array['Pass']; }
                    if(isset($params_array['Cargo'])){ $user->Cargo = $params_array['Cargo']; }

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

    //ARCHIVAR/ELIMINAR USUARIO
    //------------------------------------->
    public function delete(Request $request, $id){

        $token = $request->header('Autorization');
        $JwtAuth = new \JwtAuth;
        $checkToken = $JwtAuth->checkToken($token);

        if($checkToken){
            $user = User::findOrFail($id);
            $user->Estado = 'Inactivo';
            $user->save();    
            $delete  = array(
                'status' => 'success',
                'code' => 200,
                'message' => 'El usuario se ha actualizado',
                'user' => $user
            ); 
        }else{
            $delete  = array(
                'status' => 'error',
                'code' => 404,
                'message' => 'El Token es invalido'                
            ); 
        }

        return response()->json($delete, $delete["code"]);      

    }

    // MOSTRAR LOS PROYECTOS ASOCIADOS AL USUARIO
    // ------------------------------------------------->    

    public function project(Request $request){

        $token = $request->header('Autorization');
        $JwtAuth = new \JwtAuth;
        $checkToken = $JwtAuth->checkToken($token);

        if($checkToken){
            
            $userData = $JwtAuth->checkToken($token,true);
            // $userData->sub
            $user = User::findOrFail(1);                      

            $project  = array(
                'status' => 'success',
                'code' => 200,
                'message' => 'Los proyectos asociados al usuario',
                'project' => $user->projects
            ); 

        }else{
            $project  = array(
                'status' => 'error',
                'code' => 404,
                'message' => 'El Token es invalido'                
            ); 
        }

        return response()->json($project, $project["code"]);

    }

}
