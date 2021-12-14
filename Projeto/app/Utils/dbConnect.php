<?php

namespace App\Utils;

Class dbConnect{
  
    public static function getConnection() {

        $dbServername = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "vestuario";
 
        return mysqli_connect(  $dbServername, 
                                $dbUsername, 
                                $dbPassword, 
                                $dbName
                            );
    
    }
}

