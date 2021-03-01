<?php

/** @var \Laravel\Lumen\Routing\Router $router */


$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix'=>'proveedor'], function($router){
    $router->get('listaProveedores','ProveedorController@all');
    $router->get('listaJson','ProveedorController@allJson');
    $router->post('crearProv','ProveedorController@create');
});

$router->group(['prefix'=>'producto'], function($router){
    $router->get('listaProductos','ProductoController@allProducto');
    $router->post('crearProduc','ProductoController@create');
});

