<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Model\Roupa;
use \Exception;

Class Editar extends Page{
    
    public static function getEditar($idProduto) {
        if(!self::validateUser())
            self::blockUser();

        $roupa = Roupa::getRoupa($idProduto);

        if(!is_null($roupa)){
            $row = mysqli_fetch_assoc($roupa);
        } else {
            throw new Exception("URL não encontrada", 404);
        }
        
        $contend = View::render('pages\editar', [
            'id' => $row['id'],
            'nome' => utf8_encode($row['nome']),
            'preco' => $row['preco'],
            'estampa' => utf8_encode($row['estampa']),
            'imagemlink' => $row['imagemlink']
        ]);

        return parent::getPage('editar', $contend);
    }

    public static function updateProduto($idProduto) {
        if(!self::validateUser())
            self::blockUser();
        
        $data = $_POST;

        $roupa = Roupa::updateRoupa($idProduto, $data);

        if(!is_null($roupa)){
            $row = mysqli_fetch_assoc($roupa);
        } else {
            throw new Exception("URL não encontrada", 404);
        }

        $contend = View::render('pages\produto', [
            'nome' => utf8_encode($row['nome']),
            'preco' => $row['preco'],
            'estampa' => utf8_encode($row['estampa']),
            'imagemlink' => $row['imagemlink']
        ]);


        return parent::getPage('produto', $contend);
    }

    public static function deleteProduto($idProduto) {
        if(!self::validateUser())
            self::blockUser();

        $roupa = Roupa::deleteRoupa($idProduto);

        if(!is_null($roupa)){
            $row = mysqli_fetch_assoc($roupa);
        } else {
            throw new Exception("URL não encontrada", 404);
        }
        
        return Home::getHome();
    }

    public static function criarProduto() {
        if(!self::validateUser())
            self::blockUser();

        $data = $_POST;

        Roupa::createRoupa($data);

        $newURL = "https://localhost/projeto/";
        header('Location: '.$newURL);
        die();
    }

    public static function loadCreateForm() {
        if(!self::validateUser())
            self::blockUser();
            
        $contend = View::render('pages\criar');
        return parent::getPage('criar', $contend);
    }

    private static function validateUser(){
        return !is_null(Login::getLogin());
    }

    private static function blockUser(){
        throw new Exception("Proibido acesso", 403);
    }

}