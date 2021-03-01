<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Proveedor;
use App\Http\Helper\ResponseBilder;
use DB;

class ProveedorController extends Controller{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        //
    }

    public function all(Request $request){
        $proveedor = Proveedor::all();
        $status = true;
        $info = "Lista Proveedores";
        return ResponseBilder::result($status,$info,$proveedor);
    }

    public function allJson(Request $request){
        if($request -> isJson()){
            $proveedor = Proveedor::all();
            $status = true;
            $info = "Lista Proveedores";
            return ResponseBilder::result($status,$info,$proveedor);
        }
        return response() -> json(['error'=>'No autorizado'],401,[]);
    }

    public function create(Request $request){
        $data = $request->json()->all();
        $proveedor = Proveedor::create([
            'cedula'=> $data['cedula'],
            'nombre'=> $data['nombre'],
            'apellido'=> $data['apellido'],
            'correo'=> $data['correo'],
            'telefono'=> $data['telefono'],
            'celular'=> $data['celular'],
            'direccion'=> $data['direccion'],
        ]);
        $status = true;
        $info = "Proveedor creado con exito";
        return ResponseBilder::result($proveedor,$status,$info);
    }



    //
}
