<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;

class ImageController extends Controller
{
    public function show(){
        
        $products = Image::all();
        $show  = array(
            'status' => 'success',
            'code' => 200,
            'products' => $products->Product
        );
        return response()->json($show, $show['code']);
    }
}
