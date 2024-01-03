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
        $data = $_POST;

        // Fetches the data from the form via the name attribute of select
        $edge = $data["edge"];
        $dough = $data["dough"];
        $flavor = $data["flavors"];

        // Validations
        if(count($flavor) > 2) {
            $_SESSION["msg"] = "Select a maximum of two flavors";
            $_SESSION["status"] = "warning";
        } else {
            
        }

        // Returns to the previous page
        header("Location: ..");
    }
?>