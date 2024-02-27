<?php
    include '../../../render/connection.php';

    $facultyNo = $_POST['facultyNumber'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $username = $_POST['username'];
    $password = $_POST['password']; 
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Hash the password
    $email = $_POST['email'];

    // Prepare SQL statement
    $sql = "INSERT INTO moderator (user_givenName, user_familyName, user_username, user_password, user_email, user_faculty_number, user_member_type) VALUES ('$firstName', '$lastName', '$username', '$hashedPassword', '$email', $facultyNo, 'Faculty')";

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        $redirectUrl = "../../../moderator_account/dashboard.php";
        // Redirect back to the previous window using window.location
        echo '<script type="text/javascript">';
        echo 'window.location.href = "' . $redirectUrl . '";';
        echo '</script>';

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
?>
