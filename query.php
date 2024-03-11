<?php

$serverName = "localhost";
$userName = getenv("DB_USERNAME"); 
$password = getenv("DB_PASSWORD");
$dbName = "ticket";

$con = mysqli_connect($serverName, $userName, $password, $dbName);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());

}

?>