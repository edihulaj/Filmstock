<?php
session_start();
require 'db.php';

// 1. Handle Name Update
if(isset($_POST['new_name']) && isset($_SESSION['user_id'])) {
    $new_name = trim($_POST['new_name']);
    if(!empty($new_name)) {
        $stmt = $conn->prepare("UPDATE users SET name = ? WHERE id = ?");
        if($stmt->execute([$new_name, $_SESSION['user_id']])) {
            $_SESSION['name'] = $new_name;
            echo "success";
        } else {
            echo "Database error";
        }
    }
    exit;
}

// 2. Handle Profile Picture Upload
if(isset($_FILES['avatar']) && isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    
    // Check for specific upload errors
    if ($_FILES['avatar']['error'] !== UPLOAD_ERR_OK) {
        echo "Upload error code: " . $_FILES['avatar']['error'];
        exit;
    }

    // Use ABSOLUTE paths for server operations to fix "failed" errors
    $uploadDir = "uploads/profiles/";
    $serverDir = __DIR__ . "/" . $uploadDir;
    
    // Create directory if it doesn't exist
    if (!file_exists($serverDir)) {
        if (!mkdir($serverDir, 0777, true)) {
            echo "Failed to create directory. Permissions denied.";
            exit;
        }
    }

    $ext = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
    $filename = "pfp_" . $user_id . "_" . time() . "." . $ext;
    
    $targetFilePath = $serverDir . $filename; // For moving file
    $dbFilePath = $uploadDir . $filename;     // For saving in DB

    if(move_uploaded_file($_FILES['avatar']['tmp_name'], $targetFilePath)) {
        $stmt = $conn->prepare("UPDATE users SET avatar = ? WHERE id = ?");
        $stmt->execute([$dbFilePath, $user_id]);
        
        $_SESSION['avatar'] = $dbFilePath; 
        
        // Return format: "success|path"
        echo "success|" . $dbFilePath;
    } else {
        echo "Failed to move uploaded file.";
    }
    exit;
}
?>