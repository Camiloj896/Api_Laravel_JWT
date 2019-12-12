<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;

class ProductsController extends Controller
{
    public function show(Request $request){

        $token = $request->header('Autorization');
        $JwtAuth = new \JwtAuth;
        $checkToken = $JwtAuth->checkToken($token);

        if($checkToken){

            $userData = $JwtAuth->checkToken($token,true);
            $products = Products::all();

            $show  = array(
                'status' => 'success',
                'code' => 200,
                'products' => $products,
                'images' => $products->images[0]->id
            );

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

            $params_array = array_map("trim", $params_array);

            // Validar datos
            $validate = \Validator::make($params_array, [
                'category_id' => 'required|integer',
                'state_id'    => 'required|integer',
                'brand_id'    => 'required|integer',
                'talla_id'    => 'required|integer',
                'type'        => 'required|alpha_dash',
                'subcat'      => 'required|alpha_dash',
                'destacada'   => 'required|image',
                'image1'      => 'image',
                'image2'      => 'image',
            ]);

            if($validate->fails()){

                $data  = array(
                    'status' => 'error',
                    'code' => 404,
                    'message' => 'Los datos enviados no son correctos',
                    'errors' => $validate->errors()
                );

            }else{

                $data  = array(
                    'status' => 'success',
                    'code' => 200,
                    'message' => 'El producto se ha creado correctamente'
                );

                // Crear Producto
                $userData = $JwtAuth->checkToken($token,true);
                $Product = new Products();
                $Product->user_id = $userData->sub;
                $Product->category_id = $params_array['category_id'];
                $Product->state_id = $params_array['state_id'];
                $Product->brand_id = $params_array['brand_id'];
                $Product->talla_id = $params_array['talla_id'];
                $Product->type = $params_array['type'];
                $Product->subcat = $params_array['subcat'];

                //GUARDAR IMAGENES
                $numAleatorio = mt_rand(100, 999);
                $ruta = "../../../public/images/products/producto" . $numAleatorio . ".jpg";
                $destacada = "producto" . $numAleatorio . ".jpg";
                $origen = imagecreatefromjpeg($params_array['destacada']);
                $destino = imagecrop($origen, ["x" => 0, "y" => 0, "width" => 1600, "height" => 600]); #funcion usada para recortar una imagen
                imagejpeg($destino, $ruta); #funcion usada para cargar la imagen al servidor

                if($params_array['image1']){
                    $numAleatorio = mt_rand(100, 999);
                    $ruta = "../../../public/images/products/producto" . $numAleatorio . ".jpg";
                    $image1 = "producto" . $numAleatorio . ".jpg";
                    $origen = imagecreatefromjpeg($params_array['destacada']);
                    $destino = imagecrop($origen, ["x" => 0, "y" => 0, "width" => 1600, "height" => 600]); #funcion usada para recortar una imagen
                    imagejpeg($destino, $ruta); #funcion usada para cargar la imagen al servidor
                }

                if($params_array['image2']){
                    $numAleatorio = mt_rand(100, 999);
                    $ruta = "../../../public/images/products/producto" . $numAleatorio . ".jpg";
                    $image2 = "producto" . $numAleatorio . ".jpg";
                    $origen = imagecreatefromjpeg($params_array['destacada']);
                    $destino = imagecrop($origen, ["x" => 0, "y" => 0, "width" => 1600, "height" => 600]); #funcion usada para recortar una imagen
                    imagejpeg($destino, $ruta); #funcion usada para cargar la imagen al servidor
                }

                // guardar el Producto
                $Product->save();

                $Product->images()->saveMany([
                    new App\Images(['type' => 'destacada', 'path' => $destacada]),
                    new App\Images(['type' => 'otra', 'path' => $image2]),
                    new App\Images(['type' => 'otra', 'path' => $image2]),
                ]);

                $data  = array(
                    'status' => 'success',
                    'code' => 200,
                    'message' => 'El Producto se ha creado correctamente'
                );
            }

        }else{

            $update  = array(
                'status' => 'error',
                'code' => 404,
                'message' => 'El Token es invalido'
            );

        }

        return response()->json($update, $update['code']);

    }

    public function delete(Request $request, $id){

        $token = $request->header('Autorization');
        $JwtAuth = new \JwtAuth;
        $checkToken = $JwtAuth->checkToken($token);

        if($checkToken){

            $product = Products::findOrFail($id);
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
