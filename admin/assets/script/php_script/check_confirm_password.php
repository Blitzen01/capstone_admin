<?php
// Check if the confirm password matches the new password
$newPassword = $_POST['new_password'];
$confirmPassword = $_POST['confirm_password'];

if ($newPassword === $confirmPassword) {
    echo json_encode(['valid' => true]);
} else {
    echo json_encode(['valid' => false]);
}
?>