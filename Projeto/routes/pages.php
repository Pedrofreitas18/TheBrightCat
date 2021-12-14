<?php 

use \App\Http\Response;
use \App\Http\Router;
use \App\Controller\Pages;


$obRouter->get('/', [
    function(){
        return new Response(200, Pages\Home::getHome());
    }
]);

$obRouter->get('/sobre', [
    function(){
        return new Response(200, Pages\Sobre::getSobre());
    }
]);

/*
$obRouter->get('/produto/{idProduto}/{acao}', [
    function($idProduto, $acao){
        return new Response(200, 'Produto ' . $idProduto . ' acao ' . $acao);
    }
]);

*/

$obRouter->get('/produto/{idProduto}', [
    function($idProduto){
        return new Response(200, Pages\Produto::getProduto($idProduto));
    }
]);

$obRouter->get('/editar/{idProduto}', [
    function($idProduto){
        return new Response(200, Pages\Editar::getEditar($idProduto));
    }
]);

$obRouter->post('/atualizar/{idProduto}', [
    function($idProduto){
        return new Response(200, Pages\Editar::updateProduto($idProduto));
    }
]);

$obRouter->get('/excluir/{idProduto}', [
    function($idProduto){
        return new Response(200, Pages\Editar::deleteProduto($idProduto));
    }
]);

$obRouter->get('/criar', [
    function(){
        return new Response(200, Pages\Editar::loadCreateForm());
    }
]);

$obRouter->post('/create', [
    function(){
        return new Response(200, Pages\Editar::criarProduto());
    }
]);

$obRouter->get('/login', [
    function(){
        return new Response(200, Pages\Login::getLoginPage());
    }
]);

$obRouter->post('/signin', [
    function(){
        return new Response(200, Pages\Login::signIn());
    }
]);

$obRouter->get('/signout', [
    function(){
        return new Response(200, Pages\Login::signOut());
    }
]);
