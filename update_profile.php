<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    die("Not logged in");
}

$user_id = $_SESSION['user_id'];

// 1. Handle Avatar Upload
if(isset($_FILES['avatar'])) {
    $targetDir = "uploads/profiles/";
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    $filename = "pfp_" . $user_id . "_" . time() . ".jpg";
    $targetPath = $targetDir . $filename;
    
    if(move_uploaded_file($_FILES['avatar']['tmp_name'], $targetPath)) {
        $stmt = $conn->prepare("UPDATE users SET avatar = ? WHERE id = ?");
        $stmt->execute([$targetPath, $user_id]);
        
        $_SESSION['avatar'] = $targetPath; 
        echo "success|" . $targetPath;
    } else {
        echo "Error uploading file";
    }
}

// 2. Handle Name Change
if(isset($_POST['new_name'])) {
    $newName = trim($_POST['new_name']);
    if(!empty($newName)) {
        $stmt = $conn->prepare("UPDATE users SET name = ? WHERE id = ?");
        $stmt->execute([$newName, $user_id]);
        $_SESSION['name'] = $newName;
        echo "success";
    }
}
?>