<?php
$servername = "localhost";
$username = "root";
$password = "040703";
$dbname = "vit_results";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
