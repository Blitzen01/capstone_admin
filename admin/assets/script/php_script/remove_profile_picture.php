<?php
include '../../../render/connection.php';
session_start();

if(isset($_POST['remove_profile_picture'])) {
    // Get the username from the session
    $user = $_SESSION['username'];

    // Check if user has a previous profile picture
    $sql_previous = "SELECT user_picture FROM moderator WHERE user_username = ?";
    $stmt_previous = $conn->prepare($sql_previous);
    $stmt_previous->bind_param("s", $user);
    $stmt_previous->execute();
    $result_previous = $stmt_previous->get_result();
    $row_previous = $result_previous->fetch_assoc();
    $previous_picture = $row_previous['user_picture'];

    // Delete previous image if it exists and not the default image
    if (!empty($previous_picture) && $previous_picture !== 'default.jpg') {
        $target_dir = "../../../moderator_account/moderator_profile_picture/";
        $previous_file = $target_dir . $previous_picture;

        // Check if the file exists before attempting to delete
        if (file_exists($previous_file)) {
            // Attempt to delete the file
            if (unlink($previous_file)) {

            }
        }
    }

    // Update user_picture column to NULL in the database
    $update_sql = "UPDATE moderator SET user_picture = NULL WHERE user_username = ?";
    $stmt_update = $conn->prepare($update_sql);
    $stmt_update->bind_param("s", $user);
    if ($stmt_update->execute()) {
        $redirectUrl = "../../../admin/accountSettings.php";
        // Redirect back to the previous window using window.location
        echo '<script type="text/javascript">';
        echo 'window.location.href = "' . $redirectUrl . '";';
        echo '</script>';
    }
}
?>
