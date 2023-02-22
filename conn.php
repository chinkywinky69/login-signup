<?php

$host = "localhost";
$dbname = "gikapoy_nako_db";
$username = "root";
$password = "mysql";

$mysqli = new mysqli($host, $username, $password, $dbname);

if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}

return $mysqli;
