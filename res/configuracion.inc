<?php
    # localhost config
    $host = "localhost";
    $usuario = "root";
    $password = "";
    $db = "carrito";

    // 1. Create a database connection
    $connection = mysqli_connect($host, $usuario, $password);
    if (!$connection) {
        die("Database connection failed");
    }
    
    // 2. Select a database to use 
    $db_select = mysqli_select_db($connection, $db);
    if (!$db_select) {
        die("Database selection failed: " . mysqli_error($connection));
    }
?>