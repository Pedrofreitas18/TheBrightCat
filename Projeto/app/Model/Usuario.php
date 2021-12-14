<?php

namespace App\Model;

use \App\Utils\dbConnect;

Class Usuario{
    
    public static function validateUser($login, $senha) {

        $slq = "SELECT * FROM Usuario WHERE nome = '$login' AND senha = '$senha';";
        $result = mysqli_query(dbConnect::getConnection(), $slq);
        
        if(mysqli_num_rows($result) > 0){
            return true;
        }
        return false;
    }

}