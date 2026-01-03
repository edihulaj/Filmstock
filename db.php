<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "filmstock";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
} catch(PDOException $e) {
    die("Connection failed");
}
?>