<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IncidenceScript;

class IncidenceScriptController extends Controller
{

    //REGISTRO DE INCIDENCIAS
    //-------------------------->
    public function register(Request $request){

        //VALIDAR TOKEN
        // $token = $request->header('Autorization');
        // $JwtAuth = new \JwtAuth;
        // $checkToken = $JwtAuth->checkToken($token);       
        
        // Recoger los datos por POST            
        $json = $request->input("json", null);            
        $params_array = json_decode($json, true);
        
        if(!empty($params_array)){
            //  Limpiar los datos
            $params_array = array_map("trim", $params_array);

            // Validar datos    
            $validate = \Validator::make($params_array, [                    
                'project_id'          => 'required|integer',
                'tincidenceScript_id' => 'integer',
                'cincidenceScript_id' => 'integer',                
                'Ver_Material'        => 'integer',
                'Ver_Script'          => 'integer', 
                'Pregunta'            => 'alpha',
                'Comentario'          => 'alpha_dash',
                'Ronda'               => 'alpha',                
                'Acepta_RDM'          => 'boolean',
                'Acepta_LDC'          => 'boolean',
                'NoCambio'            => 'required|boolean'                
            ]);

            if($validate->fails()){

                $data  = array(
                    'status' => 'error',
                    'code' => 404,
                    'message' => 'La Incidencia no se ha creado',
                    'errors' => $validate->errors()
                );

            }else{
                
                // Crear Incidencia
                $incidence = new IncidenceScript();                
                //REGISTRAR FECHA LIVE
                $incidence->project_id = $params_array['project_id'];
                $incidence->NoCambio = $params_array['NoCambio'];                   
                $incidence->Ronda = $params_array['Ronda'];                
                                            
                if(isset($params_array['tincidenceScript_id'])){ $incidence->tincidenceScript_id = $params_array['tincidenceScript_id']; }
                if(isset($params_array['cincidenceScript_id'])){ $incidence->cincidenceScript_id = $params_array['cincidenceScript_id']; }                
                if(isset($params_array['Ver_Material'])){ $incidence->Ver_Material = $params_array['Ver_Material']; }
                if(isset($params_array['Ver_Script'])){ $incidence->Ver_Script = $params_array['Ver_Script']; }
                if(isset($params_array['Pregunta'])){ $incidence->Pregunta = $params_array['Pregunta']; }
                if(isset($params_array['NoCambio'])){ $incidence->NoCambio = $params_array['NoCambio']; }                    
                if(isset($params_array['Acepta_RDM'])){ $incidence->Acepta_RDM = $params_array['Acepta_RDM']; }
                if(isset($params_array['Acepta_LDC'])){ $incidence->Acepta_LDC = $params_array['Acepta_LDC']; }

                $incidence->save();

                if(isset($params_array['Comentario'])){ 
                    $correo = "prueba";
                    $incidence->comments()->create([ 'Comentario' => $params_array['Comentario'], 'Email' => $correo ]);
                }
                                
                $data  = array(
                    'status' => 'success',
                    'code' => 200,
                    'message' => 'La incidencia se ha creado correctamente'                    
                );  

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

    //MOSTRAR INFO INCIDENCIAS
    //------------------------------------->
    public function show($id){

        $incidence = App\IncidenceScript::where('project_id', $id)->get();        

        return response()->json($incidence, 200);      

    }

    
}
