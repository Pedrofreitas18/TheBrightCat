<?php

namespace App\Controller\Pages;

use \App\Utils\View;

Class Sobre extends Page{
    
    public static function getSobre() {
        
        $contend = View::render('pages\sobre');


        return parent::getPage('Sobre', $contend);
    }

}