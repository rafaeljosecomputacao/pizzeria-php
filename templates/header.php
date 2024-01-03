<?php 
    $msg = "";

    if(isset($_SESSION["msg"])) {
        $msg = $_SESSION["msg"];
        $status = $_SESSION["status"];

        $_SESSION["msg"] = "";
        $_SESSION["status"] = "";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizzeria</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Bootstrap Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous" defer></script>
    <!-- Javascript -->
    <script src="js/script.js" defer></script>
</head>
<body>
    <!-- Header -->
    <header>
        <!-- Navbar -->
        <div class="navigation-bar">
            <div class="navigation-bar-brand">
                <a href="index.php"><img src="img/logo.png" alt="Logo">Pizzeria</a>
            </div>
            <div class="navigation-bar-toggle">
                <button onclick="NavbarToggle()" class="navigation-bar-icon"><i class="bi bi-three-dots-vertical"></i></button>
            </div>
            <nav class="navigation-bar-items">
                <ul>
                    <li class="navigation-bar-item">
                        <a href="index.php">Home</a>
                    </li>
                    <li class="navigation-bar-item">
                        <a href="index.php">New Order</a>
                    </li>
                    <li class="navigation-bar-item">
                        <a href="dashboard.php">Dashboard</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <!-- Validation Message -->
    <?php if($msg != ""): ?>
        <div class="alert alert-<?= $status ?> message">
            <p><?= $msg ?></p>
        </div>
    <?php endif; ?>