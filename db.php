<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "forum";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Databasfel: " . $conn->connect_error);
}

session_start();
?>
