<?php
    $server= 'localhost';
    $username= 'id21191044_root';
    $password= 'Administrador1#';
    $database= 'id21191044_proyectosena_login_database';

    try {
        $conn = new PDO("mysql:host=$server;dbname=$database;",$username,$password);
       
    } catch(PDOException) {
        die('Connected failed: '.$e->getMessage());
    }

?>