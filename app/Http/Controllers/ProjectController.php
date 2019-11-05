<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectController extends Controller
{
    
    //CREAR PROYECTO
    //--------------------------
    public function create(Request $request){

        //VALIDAR TOKEN
        $token = $request->header('Autorization');
        $JwtAuth = new \JwtAuth;
        $checkToken = $JwtAuth->checkToken($token);          
    
        if($checkToken){
            
            // Obtener datos por POST
            $json = $request->input("json", null);            
            $params_array = json_decode($json, true);
        
            if(!empty($params_array)){
            
                //  Limpiar los datos
                $params_array = array_map("trim", $params_array);                

                // Validar datos    
                $validate = \Validator::make($params_array, [
                    'pcomision_id'   => 'integer',
                    'metodologia_id' => 'integer',
                    'solucion_id'    => 'integer',
                    'plataforma_id'  => 'integer',
                    'estatus_id'     => 'integer',
                    'tipore_id'      => 'integer',
                    'fentrega_id'    => 'integer',
                    'Jobnumber'      => 'required|regex:/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\s]*$/',
                    'Jobnumber_LDCG' => 'integer',
                    'Pname'          => 'required|regex:/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ\s]*$/',
                    'Cliente'        => 'alpha',
                    'KantarProject'  => 'boolean',   
                    'Link_KP'        => 'alpha_num',         
                    'Qlib_uso'       => 'alpha',                    
                    'Qlib_Link'      => 'alpha_num',
                    'Qlib_NA'        => 'alpha',
                    'Qlib_Metadata'  => 'boolean',
                    'Qlib_porqueM'   => 'alpha',
                    'Qlib_Web'       => 'boolean',
                    'Qlib_porqueW'   => 'alpha',
                    'Manager'        => 'required|integer',
                    'RDM'            => 'required|integer',
                    'DP'             => 'integer',
                    'Script'         => 'integer'                    
                ]);

                if($validate->fails()){
                    $data  = array(
                        'status' => 'error',
                        'code' => 404,
                        'message' => 'El proyecto no se ha creado',
                        'errors' => $validate->errors()
                    );  
                }else{
                                        
                    $JobName = (isset($params_array['Pname'])) ? mb_convert_case($params_array['Pname'], MB_CASE_TITLE, "UTF-8") : null;
                    $Clientes = (isset($params_array['Cliente'])) ? mb_convert_case($params_array['Cliente'], MB_CASE_TITLE, "UTF-8") : null;
                    
                    // Crear Proyecto
                    $proyecto = new Project();
                    if(isset($params_array['pcomision_id'])){ $proyecto->pcomision_id = $params_array['pcomision_id']; }                    
                    if(isset($params_array['metodologia_id'])){ $proyecto->metodologia_id = $params_array['metodologia_id']; }
                    if(isset($params_array['solucion_id'])){ $proyecto->solucion_id = $params_array['solucion_id']; }
                    if(isset($params_array['plataforma_id'])){ $proyecto->plataforma_id = $params_array['plataforma_id']; }
                    $proyecto->estatus_id = 1;
                    if(isset($params_array['tipore_id'])){ $proyecto->tipore_id = $params_array['tipore_id']; }
                    if(isset($params_array['fentrega_id'])){ $proyecto->fentrega_id = $params_array['fentrega_id']; }
                    $proyecto->Jobnumber = $params_array['Jobnumber'];
                    if(isset($params_array['Jobnumber_LDCG'])){ $proyecto->Jobnumber_LDCG = $params_array['Jobnumber_LDCG']; }
                    if(isset($params_array['Pname'])){ $proyecto->Pname = $JobName; }
                    if(isset($params_array['Cliente'])){ $proyecto->Cliente = $params_array['Cliente']; }
                    if(isset($params_array['KantarProject'])){ $proyecto->KantarProject = $params_array['KantarProject']; }
                    if(isset($params_array['Link_KP'])){ $proyecto->Link_KP = $params_array['Link_KP']; }
                    if(isset($params_array['Qlib_uso'])){ $proyecto->Qlib_uso = $params_array['Qlib_uso']; }
                    if(isset($params_array['Qlib_Link'])){ $proyecto->Qlib_Link = $params_array['Qlib_Link']; }
                    if(isset($params_array['Qlib_NA'])){ $proyecto->Qlib_NA = $params_array['Qlib_NA']; }
                    if(isset($params_array['Qlib_Metadata'])){ $proyecto->Qlib_Metadata = $params_array['Qlib_Metadata']; }
                    if(isset($params_array['Qlib_porqueM'])){ $proyecto->Qlib_porqueM = $params_array['Qlib_porqueM']; }
                    if(isset($params_array['Qlib_Web'])){ $proyecto->Qlib_Web = $params_array['Qlib_Web']; }
                    if(isset($params_array['Qlib_porqueW'])){ $proyecto->Qlib_porqueW = $params_array['Qlib_porqueW']; }
                    
                    // GUARDAR INFORMACION PROYECTO                    
                    $proyecto->save();

                    // GUARDAR INFORMACION 
                    
                    //
                    $proyecto->users()->attach($params_array['Manager']);
                    $proyecto->users()->attach($params_array['RDM']);
                    if(isset($params_array['DP'])){ $proyecto->users()->attach($params_array['DP']); }
                    if(isset($params_array['Script'])){ $proyecto->users()->attach($params_array['Script']); }
                    
                    
                    
                    $data  = array(
                        'status' => 'success',
                        'code' => 200,
                        'message' => 'El proyecto se ha creado correctamente'                    
                    );   

                }
               
            }else{
                $data  = array(
                    'status' => 'error',
                    'code' => 404,
                    'message' => 'Los datos enviados no son correctos'                    
                );  
            }
        }else{

            //TOKEN NO VALIDO
            $data  = array(
                'status' => 'error',
                'code' => 404,
                'message' => 'El token no es valido'                    
            );  

        }        

        return response()->json($data, $data['code']);

    }
}
