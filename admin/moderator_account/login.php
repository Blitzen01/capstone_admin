<?php
    include "../render/connection.php";
    include "../assets/cdn/cdn_links.php";

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve username and password from the form
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Prepare SQL statement to select user with the provided username
        $sql = "SELECT * FROM moderator WHERE user_username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if a row was returned
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            // Verify the password
            if (password_verify($password, $row['user_password'])) {
                // Redirect to the admin panel or moderator dashboard upon successful login
                session_start();
                $_SESSION['username_moderator'] = $username;
                header("Location: dashboard.php");
                exit;
            }
        }

        header("Location: index.php?error=1");

        // Close prepared statement
        $stmt->close();
    }
?>
