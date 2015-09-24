<?php

$servername = "localhost";
$username = "albacorp_test";
$password = "oL38HSZ^WRs4";
$dbname = "albacorp_app_facebook";

$conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    } 


?>