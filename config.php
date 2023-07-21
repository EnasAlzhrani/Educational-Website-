<?php

    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "alphabet";

    $connection = new mysqli($host, $user, $password, $database);

    if (mysqli_connect_errno()){
        die(mysqli_connect_errno());
    }
    session_start(); 
?>