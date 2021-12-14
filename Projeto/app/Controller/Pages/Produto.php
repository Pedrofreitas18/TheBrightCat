<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Model\Roupa;
use \Exception;

Class Produto extends Page{
    
    public static function getProduto($idProduto) {
        $roupa = Roupa::getRoupa($idProduto);

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
}