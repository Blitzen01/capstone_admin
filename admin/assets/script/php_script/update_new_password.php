<?php
include '../../../render/connection.php';
session_start(); // Start the session if not already started

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input
    $oldPassword = $_POST["old_password"];
    $newPassword = $_POST["new_password"];
    $confirmPassword = $_POST["confirm_password"];

    // Verify if new password matches the confirmed password
    if ($newPassword !== $confirmPassword) {
        echo json_encode(array("success" => false, "message" => "New password and confirm password do not match"));
        exit;
    }

    // Hash the new password
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    // Update the database
    $username = $_SESSION["username"];
    $stmt = $pdo->prepare("UPDATE moderator SET user_password = ? WHERE user_username = ?");
    
    // Bind parameters
    $stmt->bindParam(1, $hashedPassword);
    $stmt->bindParam(2, $username);

    // Execute the statement and handle errors
    if ($stmt->execute()) {
        if ($stmt->rowCount() > 0) {
            $_SESSION['password'] = $newPassword;
            $redirectUrl = "../../../admin/accountSettings.php";
            // Redirect back to the previous window using window.location
            echo '<script type="text/javascript">';
            echo 'window.location.href = "' . $redirectUrl . '";';
            echo '</script>';
        } else {
            echo json_encode(array("success" => false, "message" => "Failed to update password. No rows affected."));
        }
    } else {
        // Print the error details
        echo json_encode(array("success" => false, "message" => "Failed to update password. Error: " . implode(" ", $stmt->errorInfo())));
    }
} else {
    echo json_encode(array("success" => false, "message" => "Invalid request method"));
}
?>
