<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "filmstock";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Lidhja deshtoi: " . $e->getMessage());
}
?>