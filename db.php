<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "student_ai";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

?>