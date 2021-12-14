<?php

namespace App\Model;

use \App\Utils\dbConnect;

Class Roupa{
    
    public static function getRoupas() {

        $slq = 'SELECT * FROM Roupa;';
        $result = mysqli_query(dbConnect::getConnection(), $slq);
        
        if(mysqli_num_rows($result) > 0){
            return $result;
        }
        return null;
    }

    public static function getRoupa($id) {

        $slq = "SELECT * FROM Roupa WHERE id = $id;";
        $result = mysqli_query(dbConnect::getConnection(), $slq);
        
        if(mysqli_num_rows($result) > 0){
            return $result;
        }
        return null;
    }

    public static function updateRoupa($id, $data) {

        $nome = $data['nome'];
        $estampa = $data['estampa'];
        $preco = $data['preco'];
        $imagemlink = $data['imagemlink'];

        $slq = "UPDATE Roupa SET nome = '$nome', estampa = '$estampa', preco = $preco , imagemlink = '$imagemlink' WHERE id = $id";
        mysqli_query(dbConnect::getConnection(), $slq);

        return self::getRoupa($id);   
    }

    public static function deleteRoupa($id) {
        $roupa = self::getRoupa($id);

        if(is_null($roupa)){
            throw new Exception("URL não encontrada", 404);
        }

        $slq = "DELETE FROM Roupa WHERE id = $id;";
        //mysqli_query(dbConnect::getConnection(), $slq);

        return $roupa;   
    }

    public static function createRoupa($data) {

        $nome = $data['nome'];
        $estampa = $data['estampa'];
        $preco = $data['preco'];
        $imagemlink = $data['imagemlink'];

        $slq = "INSERT INTO Roupa (nome, estampa, preco, imagemlink)
        VALUES ('$nome', '$estampa', $preco, '$imagemlink');";
        mysqli_query(dbConnect::getConnection(), $slq);
    }



}