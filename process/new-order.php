<?php
    include_once("connection-database.php");

    $method = $_SERVER["REQUEST_METHOD"];

    // Get data for select
    if($method === "GET") {
        $edgesQuery = $connection->query("SELECT * FROM edges;");
        $edges = $edgesQuery->fetchAll();

        $doughsQuery = $connection->query("SELECT * FROM doughs;");
        $doughs = $doughsQuery->fetchAll();

        $flavorsQuery = $connection->query("SELECT * FROM flavors;");
        $flavors = $flavorsQuery->fetchAll();

    // Create order
    } else if($method === "POST") {

    }
?>