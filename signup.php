<?php
require 'db.php';

if(isset($_POST['name'], $_POST['email'], $_POST['password'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $check = $conn->prepare("SELECT id FROM users WHERE email=?");
    $check->execute([$email]);

    if($check->rowCount() > 0){
        echo "Email already taken";
    } else {
        $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        if($stmt->execute([$name, $email, $pass])){
            echo "success";
        } else {
            echo "error";
        }
    }
}
?>