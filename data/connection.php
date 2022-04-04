<?php

    // global variables
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'db_teams';

    // establish connection
    $connect = mysqli_connect($servername, $username, $password, $database);
    
    // connection error
    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }

?>