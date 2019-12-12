<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Product;
use App\Image;


class ProductsController extends Controller
{
    public function show(Request $request, $id = null){

        $token = $request->header('Autorization');
        $JwtAuth = new \JwtAuth;
        $checkToken = $JwtAuth->checkToken($token);

        if($checkToken){

            $userData = $JwtAuth->checkToken($token,true);            
            if($id){
                
                $products = Product::findOrFail($id);

                $show  = array(
                    'status' => 'success',
                    'code' => 200,
                    'products' => $products,
                    'image' => $products->images,
                );

            }else{
                $products = DB::table('products')
                ->join('images', 'products.id', '=', 'images.product_id')                              
                ->select('products.*', 'images.type', 'images.path')
                ->get();

                $show  = array(
                    'status' => 'success',
                    'code' => 200,
                    'products' => $products,
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

    public function new(Request $request){

        $token = $request->header('Autorization');
        $JwtAuth = new \JwtAuth;
        $checkToken = $JwtAuth->checkToken($token);

        if($checkToken){
            
            $params_array = array(
                'category_id' => $request->category_id,
                'state_id' => $request->state_id,
                'brand_id' => $request->brand_id,
                'talla_id' => $request->talla_id,
                'type' => $request->type,
                'subcat' => $request->subcat,
                'destacada' => $request->file('destacada'),
                'image1' => $request->file('image1'),
                'image2' => $request->file('image2'),
            );
            
            // Validar datos
            $validate = \Validator::make($params_array, [
                'category_id' => 'required|integer',
                'state_id'    => 'required|integer',
                'brand_id'    => 'required|integer',
                'talla_id'    => 'required|integer',
                'type'        => 'required|alpha_dash',
                'subcat'      => 'required|alpha_dash',
                'destacada'   => 'required|image',
                'image1'      => 'required|image',
                'image2'      => 'required|image'
            ]);

            if($validate->fails()){

                $data  = array(
                    'status' => 'error',
                    'code' => 404,
                    'message' => 'Los datos enviados no son correctos',
                    'errors' => $validate->errors()
                );

            }else{

                $userData = $JwtAuth->checkToken($token,true);
                $Product = new Product();
                $Product->user_id = $userData->sub;
                $Product->category_id = $params_array['category_id'];
                $Product->state_id = $params_array['state_id'];
                $Product->brand_id = $params_array['brand_id'];
                $Product->talla_id = $params_array['talla_id'];
                $Product->type = $params_array['type'];
                $Product->subcat = $params_array['subcat'];

                $destacada = $request->file('destacada')->getClientOriginalname();
                $request->file('destacada')->move(public_path('images'), $destacada);

                $image1 = $request->file('image1')->getClientOriginalname();
                $request->file('image1')->move(public_path('images'), $image1);

                $image2 = $request->file('image2')->getClientOriginalname();
                $request->file('image2')->move(public_path('images'), $image2);

                $Product->save();

                $Product->images()->saveMany([
                    new Image(['type' => 'destacada', 'path' => $destacada]),
                    new Image(['type' => 'otra', 'path' => $image1]),
                    new Image(['type' => 'otra', 'path' => $image2]),
                ]);

                $data  = array(
                    'status' => 'success',
                    'code' => 200,
                    'message' => 'El producto se ha creado correctamente'
                );

            }      

        }else{

            $data  = array(
                'status' => 'error',
                'code' => 404,
                'message' => 'El Token es invalido'
            );

        }

        return response()->json($data, $data['code']);

    }

    public function update(Request $request, $id){

        $token = $request->header('Autorization');
        $JwtAuth = new \JwtAuth;
        $checkToken = $JwtAuth->checkToken($token);

        if($checkToken){
            
            $params_array = array(
                'category_id' => $request->category_id,
                'state_id' => $request->state_id,
                'brand_id' => $request->brand_id,
                'talla_id' => $request->talla_id,
                'type' => $request->type,
                'subcat' => $request->subcat                
            );
            
            // Validar datos
            $validate = \Validator::make($params_array, [
                'category_id' => 'required|integer',
                'state_id'    => 'required|integer',
                'brand_id'    => 'required|integer',
                'talla_id'    => 'required|integer',
                'type'        => 'required|alpha_dash',
                'subcat'      => 'required|alpha_dash',                
            ]);

            if($validate->fails()){

                $data  = array(
                    'status' => 'error',
                    'code' => 404,
                    'message' => 'Los datos enviados no son correctos',
                    'errors' => $validate->errors()
                );

            }else{

                $userData = $JwtAuth->checkToken($token,true);
                $Product = Product::findOrFail($id);                
                $Product->category_id = $params_array['category_id'];
                $Product->state_id = $params_array['state_id'];
                $Product->brand_id = $params_array['brand_id'];
                $Product->talla_id = $params_array['talla_id'];
                $Product->type = $params_array['type'];
                $Product->subcat = $params_array['subcat'];

                $Product->save();

                $data  = array(
                    'status' => 'success',
                    'code' => 200,
                    'message' => 'El producto se ha actualizado correctamente'
                );

            }      

        }else{

            $data  = array(
                'status' => 'error',
                'code' => 404,
                'message' => 'El Token es invalido'
            );

        }

        return response()->json($data, $data['code']);


    }

    public function delete(Request $request, $id){

        $token = $request->header('Autorization');
        $JwtAuth = new \JwtAuth;
        $checkToken = $JwtAuth->checkToken($token);

        if($checkToken){

            $product = Product::findOrFail($id);
            $product->delete();
            $delete  = array(
                'status' => 'success',
                'code' => 200,
                'message' => 'El producto se ha eliminado'
            );

        }else{

            $delete  = array(
                'status' => 'error',
                'code' => 404,
                'message' => 'El Token es invalido'
            );

        }

        return response()->json($delete, $delete['code']);

    }
}
