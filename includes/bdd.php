<?php 
    $dsn = 'mysql:dbname=jemo;host=localhost';
    $user = 'root';
    $password = '';
    
    try{
        $bdd = new PDO($dsn, $user, $password);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        echo"Echec de la connexion" .$e->getMessage();
    }

?>