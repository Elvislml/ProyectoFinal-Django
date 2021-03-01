<?php

    namespace App\Models;
    use Illuminate\Database\Eloquent\Model;

    class Producto extends Model{
        protected $table = 'modelo_producto';
        protected $fillable = [
            'nombreProducto',
            'precio',
            'cantidad'
        ];
        protected $hidden = [
            'proveedor_id',
            'producto_id'
        ];

        public $timestamps = false;
    }

?>