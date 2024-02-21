<?php
    $newPassword = $_POST['new_password'];
    $length = strlen($newPassword);
    $strength = '';

    if ($length < 6) {
        $strength = 'Weak';
    } elseif ($length < 10) {
        $strength = 'Moderate';
    } else {
        $strength = 'Strong';
    }

    echo json_encode(['strength' => $strength]);
?>