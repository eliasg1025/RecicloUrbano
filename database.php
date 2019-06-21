<?php

// Retorna una objeto PDO

function abrirConexion() {
    $server = "bp8a1elrbvrgj7rf6kb4-mysql.services.clever-cloud.com";
    $username = "uzgrhfri9mx1u6me";
    $password = "XD4vSpqI4OmJkGFnlZyl";
    $database = "bp8a1elrbvrgj7rf6kb4";

    try {
        $connection = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connection;

    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}
