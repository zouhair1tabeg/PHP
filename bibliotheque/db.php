<?php

$dsn = 'mysql:host=localhost;dbname=BibliothequeDB';
$username = "root"; 
$password = "mysql1234"; 
$options = [];

try {
    
    $connexion = new PDO($dsn, $username, $password, $options);
     
} catch (PDOException $e) {
    
}

?>