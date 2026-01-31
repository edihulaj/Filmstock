<?php
session_start();
require 'db.php';

if(!isset($_SESSION['user_id'])) { die("Login required"); }

// Verify Creator Status
$stmt = $conn->prepare("SELECT is_creator FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch();

if(!$user || $user['is_creator'] != 1) { die("Permission denied"); }

if(isset($_FILES['file'], $_POST['title'], $_POST['type'])) {
    $user_id = $_SESSION['user_id'];
    $title = $_POST['title'];
    $type = $_POST['type'];

    // Use absolute paths
    $uploadDir = "uploads/assets/";
    $serverDir = __DIR__ . "/" . $uploadDir;
    
    if (!file_exists($serverDir)) { 
        mkdir($serverDir, 0777, true); 
    }

    $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
    $filename = "asset_" . $user_id . "_" . time() . "." . $ext;
    
    $targetPath = $serverDir . $filename;
    $dbPath = $uploadDir . $filename;

    if(move_uploaded_file($_FILES['file']['tmp_name'], $targetPath)) {
        $sql = "INSERT INTO assets (user_id, title, type, file_path, created_at) VALUES (?, ?, ?, ?, NOW())";
        $stmt = $conn->prepare($sql);
        
        if($stmt->execute([$user_id, $title, $type, $dbPath])) {
            echo "success";
        } else {
            echo "Database error";
        }
    } else {
        echo "File move failed";
    }
}
?>