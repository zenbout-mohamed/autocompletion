<?php
$host = 'localhost';
$dbname = 'automcompletion';
$user = 'root';
$pass = '';


try{
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    die("Erreur à la connexion : ". $e->getMessage());
}

?>