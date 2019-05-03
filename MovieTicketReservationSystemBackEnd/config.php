<?php

    $server = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "movieticketreservationsystem";

    $connection = new mysqli($server, $dbUsername, $dbPassword, $dbname);

    if($connection->connect_error){
        die("Connection Failed : " .$connection->connect_error);
    }


?>