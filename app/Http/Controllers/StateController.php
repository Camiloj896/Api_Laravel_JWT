<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\State;

class StateController extends Controller
{
    //MOSTRAR INFO
    //------------------------------------->
    public function show(){

        $State = State::all();

        $show  = array(
            'status' => 'success',
            'code' => 200,
            'users' => $State
        );

        return response()->json($show, $show['code']);

    }
}
