<?php

$serverName = "localhost";
$userName = "mis";
$password = "Mysql123";
$dbName = "ticket";

$con = mysqli_connect($serverName, $userName, $password, $dbName);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());

}

?>