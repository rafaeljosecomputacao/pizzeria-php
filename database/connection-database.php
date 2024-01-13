<?php 
    session_start();

    include_once("connection-string.php");

    try {
        $connection = new PDO("mysql:host={$localhost}; dbname={$database}", $user, $password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    } catch (PDOException $e) {
        print "Error: " . $e->getMessage() . "<br/>";
        die();
    }
?>