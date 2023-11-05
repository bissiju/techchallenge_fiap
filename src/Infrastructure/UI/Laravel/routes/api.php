<?php

$api = app('Dingo\Api\Routing\Router');

$api->group(['namespace' => 'App\Http\Controllers\Api\V1', 'version' => 'v1'], function ($api) {
    $api->post('cadastrarCliente', 'CustomerController@store');
    $api->post('pesquisarCliente', 'CustomerController@find');
    $api->post('realizarPedido', 'OrderController@store');
    $api->get('listarPedidosDoDia', 'OrderController@view');
    $api->post('cadastrarProduto', 'ProductController@store');
    $api->post('editarProduto', 'ProductController@edit');
    $api->post('deletarProduto', 'ProductController@delete');
    $api->post('pesquisarProduto', 'ProductController@view');
});
