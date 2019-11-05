<?php
namespace App\Helpers;

use Firebase\JWT\JWT;
use Iluminate\Support\Facades\DB;
use App\User;

Class JwtAuth{

    public $key;

    public function __construct(){
        $this->key = "esto es una key secreta";
    }

    public function signup($email, $password, $getToken = null){    

        // Buscar Si existe el usuario con sus credenciales

        $user = User::where([
            'Email' => $email,
            'Pass' => $password
        ])->first();

        // Comprobar si son correctas

        $signup = false;
        if(is_object($user)){
            $signup = true;
        }

        //Generar el token con los datos del usuario identificado

        if($signup){

            $token = array(
                "sub"   => $user->id,
                "email" => $user->email,
                "name" => $user->name,
                "surmane" => $user->surname,
                "iat" => time(),
                "exp" => time() + (7 * 24 *60 * 60)
            );

            $jwt = JWT::encode($token, $this->key, 'HS256');
            $decoded = JWT::decode($jwt, $this->key, ['HS256']);

            if(is_null($getToken)){
                $data = $jwt;
            }else{
                $data = $decode;
            }
        
        }else{

            $data = array(
                "status" => "error",
                "code" => 400,
                "message" => "Login Incorrecto"
            );

        }

        // Devolver los datos decodificados o el token, en funcion de un parametro
        
        return $data;
    }

    public function checkToken($jwt, $getIdentity = false){

        $Auth = false;

        try{
            $decode = JWT::decode($jwt, $this->key, ['HS256']);
        }catch(\UnexpectedValueException $e){
            $Auth = false;
        }catch(\DomainExeption $e){
            $Auth = false;
        }

        if(!empty($decode) && is_object($decode) && isset($decode->sub)){
            $Auth = true;
        }else{
            $Auth = false;
        }

        if($getIdentity){
            return $decode;
        }

        return $Auth;        

    }

}