<?php
session_start();
require 'db.php';

// Check if user is logged in AND is a creator
if(isset($_SESSION['user_id']) && isset($_SESSION['is_creator']) && $_SESSION['is_creator'] == 1) {
    
    if(isset($_FILES['file'], $_POST['title'], $_POST['type'])) {
        $title = $_POST['title'];
        $desc = $_POST['description'] ?? '';
        $type = $_POST['type'];
        
        $targetDir = "uploads/assets/";
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        $fileName = time() . "_" . basename($_FILES['file']['name']);
        $targetFilePath = $targetDir . $fileName;
        
        if(move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)) {
            try {
                $stmt = $conn->prepare("INSERT INTO assets (user_id, title, description, file_path, type) VALUES (?, ?, ?, ?, ?)");
                $stmt->execute([$_SESSION['user_id'], $title, $desc, $targetFilePath, $type]);
                echo "success";
            } catch(PDOException $e) {
                echo "Database Error: " . $e->getMessage();
            }
        } else {
            echo "Error moving file.";
        }
    } else {
        echo "Missing data.";
    }
} else {
    echo "Permission denied.";
}
?>