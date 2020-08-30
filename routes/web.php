<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return 'API REST';
});

$router->group(['prefix' => 'clientes'], function () use ($router){
    $router->get('/', 'ClienteController@index');
    $router->get('/{cliente}', 'ClienteController@show');
    $router->post('/','ClienteController@store');
    $router->put('/{cliente}','ClienteController@update');
    $router->delete('/{cliente}','ClienteController@destroy');
});

$router->group(['prefix' => 'pasteis'], function () use ($router){
    $router->get('/', 'PastelController@index');
    $router->get('/{pastel}', 'PastelController@show');
    $router->post('/','PastelController@store');
    $router->put('/{pastel}','PastelController@update');
    $router->delete('/{pastel}','PastelController@destroy');
});

$router->group(['prefix' => 'pedido'], function () use ($router){
    $router->get('/', 'PedidoController@index');
    $router->get('/{pedido}', 'PedidoController@show');
    $router->post('/','PedidoController@store');
    $router->put('/{pedido}','PedidoController@update');
    $router->delete('/{pedido}','PedidoController@destroy');
});

