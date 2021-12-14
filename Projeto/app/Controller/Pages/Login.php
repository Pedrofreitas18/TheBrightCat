<?php

namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Model\Usuario;

Class Login extends Page{
    
    public static function getLoginPage() {
        $contend = View::render('pages\login');
        return parent::getPage('login', $contend);
    }

    public static function signIn() {
        session_start();
        
        $login = $_POST['login'];
        $senha = $_POST['senha'];

        if(!isset($_SESSION['login'])){
            if(!isset($_POST['acao'])){
                if(Usuario::validateUser($login, $senha)){
                    $_SESSION['login'] = $login;
                    $URL = "https://localhost/projeto/";
                    header('Location: '.$URL);
                    die();
                }
            }
        }
        $URL = "https://localhost/projeto/login";
        header('Location: '.$URL);
        die();


    }

    public static function signOut() {             
        session_start();
        if(isset($_SESSION['login'])){
            unset($_SESSION['login']);
            session_destroy();
        }
        $URL = "https://localhost/projeto/login";
        header('Location: '.$URL);
        die();
    }

    public static function getLogin() { 
        session_start();
        if(isset($_SESSION['login'])){
            $login = $_SESSION['login'];
            return $login;
        }
        return null;
    }
        
    


}