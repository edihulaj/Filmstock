<?php
session_start(); // Added to track the user across pages
require 'db.php';

if(isset($_POST['email'], $_POST['password'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if($user && password_verify($password, $user['password'])){
        // Store user info in session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        echo "success";
    } else {
        echo "fail";
    }
}
?>