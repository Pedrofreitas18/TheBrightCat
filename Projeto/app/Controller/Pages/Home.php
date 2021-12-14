<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Model\Roupa;

Class Home extends Page{
    
    public static function getHome() {

        $contend = View::render('pages\home', [
            'cards' => self::generateHome()
        ]);

        return parent::getPage('Home Page', $contend);
    }

    private static function generateHome(){

        $returnString = '';
        $roupas = Roupa::getRoupas();
        $isAdm = !is_null(Login::getLogin());
        
        if(!is_null($roupas)){
            while($row = mysqli_fetch_assoc($roupas)){ 
                $editButton = $isAdm ? self::generateEditButton($row['id']) : '';

                $returnString .= 
                '<div class="card mb-4">
                    <a href="#!"><img class="card-img-top" src="'.$row['imagemlink'].'" alt="..." /></a>
                    <div class="card-body">
                        <div class="small text-muted">Estampa '.utf8_encode($row['estampa']).'</div>
                        <h2 class="card-title">'.utf8_encode($row['nome']).'</h2>
                        <p class="card-text">Preço R$ '.$row['preco'].'</p>
                        <a class="btn btn-primary" href="projeto/produto/'.$row['id'].'">Comprar</a>
                        '.$editButton.'
                    </div>
                </div>';   
            }
        }
        return $returnString;
    }

    private static function generateEditButton($id){
        return '<a class="btn btn-primary" style="background-color: rgb(207, 31, 31);" href="projeto/editar/'.$id.'">Editar</a>';
    }
}