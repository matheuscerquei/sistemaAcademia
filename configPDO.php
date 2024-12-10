<?php 
    try{
            $pdo = new PDO("mysql:dbname=academia;host=localhost:3306","root","cimatec");//cimatec

    }catch (Exception $e){
        echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    }
?>