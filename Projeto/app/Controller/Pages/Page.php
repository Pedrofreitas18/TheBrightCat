<?php

namespace App\Controller\Pages;

use \App\Utils\View;

Class Page{
    
    private static function getHeader() {
        $login = Login::getLogin();

        if(is_null($login)){
            $text = '';
        } else{
            $text = " - Logado como " . $login;   
        } 
        
        return View::render('pages\header', [
            'loginHeader' => $text
        ]);
    }

    private static function getFooter() {
        return View::render('pages\footer');
    }


    public static function getPage($title, $content) {
        return View::render('pages\page', [
            'title' => $title,
            'header' => self::getHeader(),
            'footer' => self::getFooter(),
            'content' => $content
        ]);
    }

}