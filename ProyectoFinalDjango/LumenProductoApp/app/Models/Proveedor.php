<?php

    namespace App\Models;
    use Illuminate\Database\Eloquent\Model;

    class Proveedor extends Model{
        protected $table = 'modelo_proveedor';
        protected $fillable = [
            'cedula',
            'nombre',
            'apellido',
            'correo',
            'telefono',
            'celular',
            'direccion'
        ];
        protected $hidden = [
            'proveedor_id'
        ];

        public $timestamps = false;
    }




?>