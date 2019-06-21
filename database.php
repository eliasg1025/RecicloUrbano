<?php

// Retorna una objeto PDO

function abrirConexion() {
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "reciclaurbano";

    try {
        $connection = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connection;

    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}
