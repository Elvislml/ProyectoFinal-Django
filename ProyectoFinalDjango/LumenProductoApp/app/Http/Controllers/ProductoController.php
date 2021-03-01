<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Http\Helper\ResponseBilder;
use DB;

class ProductoController extends Controller{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        //
    }

    public function allProducto(Request $request){
        $producto = Producto::all();
        $status = true;
        $info = "Lista Productos";
        return ResponseBilder::result($status,$info,$producto);
    }

    public function create(Request $request){
        $data = $request->json()->all();
        $producto = Producto::create([
            'nombreProducto'=> $data['nombreProducto'],
            'precio'=> $data['precio'],
            'cantidad'=> $data['cantidad'],
        ]);
        $status = true;
        $info = "Producto creado con exito";
        return ResponseBilder::result($producto,$status,$info);
    }

}