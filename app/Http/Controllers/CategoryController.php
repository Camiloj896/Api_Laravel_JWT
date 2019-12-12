<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    //MOSTRAR INFOf
    //------------------------------------->
    public function show(){

        $Category = Category::all();

        $show  = array(
            'status' => 'success',
            'code' => 200,
            'users' => $Category
        );

        return response()->json($show, $show['code']);

    }
}
