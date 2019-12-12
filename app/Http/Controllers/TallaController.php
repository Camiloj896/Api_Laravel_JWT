<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Talla;

class TallaController extends Controller
{
    //MOSTRAR INFO
    //------------------------------------->
    public function show(){

        $Talla = Talla::all();

        $show  = array(
            'status' => 'success',
            'code' => 200,
            'users' => $Talla
        );

        return response()->json($show, $show['code']);

    }
}
