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
        if($edge == "" || $dough == "" || !is_countable($flavor) || (is_countable($flavor) && count($flavor) > 2)) {
            $msg = "";

            if($edge == "") {
                $msg .= "Select a edge" . "<br>";
            }
            if($dough == "") {
                $msg .= "Select a dough" . "<br>";
            }
            if(!is_countable($flavor)) {
                $msg .= "Select one or two flavors" . "<br>";
            }
            if(is_countable($flavor) && count($flavor) > 2) {
                $msg .= "Select a maximum of two flavors" . "<br>";
            }

            // User feedback
            $_SESSION["msg"] = $msg;
            $_SESSION["status"] = "warning";
        } else {
            // Saving edge and dough on pizza
            $pizza = $connection->prepare("INSERT INTO pizzas (edge_id, dough_id) VALUES (:edge, :dough)");

            // Filtering inputs
            $pizza->bindParam(":edge", $edge, PDO::PARAM_INT);
            $pizza->bindParam(":dough", $dough, PDO::PARAM_INT);

            $pizza->execute();

            // Retrieving the last id of the last pizza
            $pizzaId = $connection->lastInsertId();

            // Saving flavors on pizza
            $pizza = $connection->prepare("INSERT INTO pizza_flavor (pizza_id, flavor_id) VALUES (:pizza, :flavor)");

            foreach($flavor as $flavorId) {
                // Filtering inputs
                $pizza->bindParam(":pizza", $pizzaId, PDO::PARAM_INT);
                $pizza->bindParam(":flavor", $flavorId, PDO::PARAM_INT);

                $pizza->execute();
            }

            // Saving the pizza order
            $pizza = $connection->prepare("INSERT INTO orders (pizza_id, state_id) VALUES (:pizza, :state)");

            // State always starts with 1 (Preparation)
            $stateId = 1;

            // Filtering inputs
            $pizza->bindParam(":pizza", $pizzaId);
            $pizza->bindParam(":state", $stateId);

            $pizza->execute();

            // User feedback
            $_SESSION["msg"] = "Complete new order";
            $_SESSION["status"] = "success";
        }

        // Returns to the previous page
        header("Location: ..");
    }
?>