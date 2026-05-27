
<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "AR";

$conn = new mysqli($host, $user, $password, $database);

$connection_error = "";


if ($conn->connect_error) {
    $connection_error = "Unable to connect to database. Please try again later.";
}
?>