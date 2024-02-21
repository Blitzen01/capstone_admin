<?php
session_start();

// Check if the old password matches the one stored in the session
if ($_POST['old_password'] === $_SESSION['password']) {
    echo json_encode(['valid' => true]);
} else {
    echo json_encode(['valid' => false]);
}
?>