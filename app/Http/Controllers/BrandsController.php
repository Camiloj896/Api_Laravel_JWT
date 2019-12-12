<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brands;

class BrandsController extends Controller
{
    //MOSTRAR INFO
    //------------------------------------->
    public function show(){

        $Brands = Brands::all();

        $show  = array(
            'status' => 'success',
            'code' => 200,
            'users' => $Brands
        );

        return response()->json($show, $show['code']);

    }
}
