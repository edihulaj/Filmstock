<?php
require 'db.php';

if(isset($_POST['name'], $_POST['email'], $_POST['password'])){
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Kontrollo nese ekziston emaili
    $check = $conn->prepare("SELECT id FROM users WHERE email=?");
    $check->execute([$email]);

    if($check->rowCount() > 0){
        echo "Email ekziston";
    } else {
        $sql = "INSERT INTO users (name, email, password, is_creator) VALUES (?, ?, ?, 0)";
        $stmt = $conn->prepare($sql);
        if($stmt->execute([$name, $email, $pass])){
            echo "success";
        } else {
            echo "Gabim";
        }
    }
}
?>