<?php 
    include_once("connection-database.php");

    $method = $_SERVER["REQUEST_METHOD"];

    // Get data for dashboard
    if($method === "GET") {
        $ordersQuery = $connection->query("SELECT * FROM orders;");
        $orders = $ordersQuery->fetchAll();

        $pizzas = [];

        // Assembling pizza
        foreach($orders as $order) {
            $pizza = [];

            // Defining an array for pizza
            $pizza["id"] = $order["pizza_id"];

            // Rescuing pizza
            $pizzaQuery = $connection->prepare("SELECT * FROM pizzas WHERE id = :pizza_id");

            $pizzaQuery->bindParam(":pizza_id", $pizza["id"]);

            $pizzaQuery->execute();

            $pizzaData = $pizzaQuery->fetch(PDO::FETCH_ASSOC);

            // Rescuing edge
            $edgeQuery = $connection->prepare("SELECT * FROM edges WHERE id = :edge_id");

            $edgeQuery->bindParam(":edge_id", $pizzaData["edge_id"]);

            $edgeQuery->execute();

            $edgeData = $edgeQuery->fetch(PDO::FETCH_ASSOC);

            $pizza["edge"] = $edgeData["edge"];

            // Rescuing dough
            $doughQuery = $connection->prepare("SELECT * FROM doughs WHERE id = :dough_id");

            $doughQuery->bindParam(":dough_id", $pizzaData["dough_id"]);

            $doughQuery->execute();

            $doughData = $doughQuery->fetch(PDO::FETCH_ASSOC);

            $pizza["dough"] = $doughData["dough"];

            // Rescuing flavors
            $flavorsQuery = $connection->prepare("SELECT * FROM pizza_flavor WHERE pizza_id = :pizza_id");

            $flavorsQuery->bindParam(":pizza_id", $pizza["id"]);

            $flavorsQuery->execute();

            $flavorsData = $flavorsQuery->fetchAll(PDO::FETCH_ASSOC);

            // Rescuing flavor
            $flavorsPizza = [];

            $flavorQuery = $connection->prepare("SELECT * FROM flavors WHERE id = :flavor_id");

            foreach($flavorsData as $flavor) {
                $flavorQuery->bindParam(":flavor_id", $flavor["flavor_id"]);

                $flavorQuery->execute();
    
                $flavorData = $flavorQuery->fetch(PDO::FETCH_ASSOC);

                array_push($flavorsPizza, $flavorData["flavor"]);
            }

            $pizza["flavors"] = $flavorsPizza;

            // Rescuing order state
            $pizza["state"] = $order["state_id"];

            // Add assembled pizza
            array_push($pizzas, $pizza);
        }
        
        // Rescuing states
        $statesQuery = $connection->query("SELECT * FROM states;");

        $states = $statesQuery->fetchAll();

    // Sync order state and delete order
    } else if($method === "POST") {
        // Checking post type
        $type = $_POST["type"];

        // Delete order
        if($type === "delete") {
            $pizzaId = $_POST["id"];

            $deleteQuery = $connection->prepare("DELETE FROM orders WHERE pizza_id = :pizza_id");

            $deleteQuery->bindParam(":pizza_id", $pizzaId, PDO::PARAM_INT);

            $deleteQuery->execute();

            // User feedback
            $_SESSION["msg"] = "Deleted order";
            $_SESSION["status"] = "danger";
        }

        // Returns to dashboard
        header("Location: ../dashboard.php");
    }
?>