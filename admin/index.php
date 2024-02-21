<?php
    include 'render/connection.php';
    include 'assets/cdn/cdn_links.php';
    include 'assets/fonts/fonts.php';

    // Check if the user is already logged in
    session_start();
    if (isset($_SESSION['username'])) {
        header("Location: admin/dashboard.php"); // Redirect to the dashboard if already logged in
        exit;
    }

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
                $_SESSION['username'] = $username; // Store the username in session
                $_SESSION['password'] = $password; // Store the username in session
                header("Location: admin/dashboard.php");
                exit;
            }
        }


        // If credentials are incorrect, display an error message
        echo "Invalid username or password. Please try again.";

        // Close prepared statement
        $stmt->close();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CVSU Tanza Campus - Library</title>

    <link rel="stylesheet" href="assets/style/style.css">

</head>

<body>
    <div id="adminLogin" class="card shadow-lg">

        <div class="text-center pt-2">
            <img src="assets/image/cvsu_library.png" alt="" srcset="">
        </div>
        <div class="card-body">
            <form class="pt-1" action="index.php" method="post">
                <h2>Librarian</h2>

                <div id="text-field">
                    <label for="username">Username</label>
                    <input type="text" name="username" autocomplete="off" required placeholder="Enter your username">
                </div>
                <div id="text-field">
                    <label for="password">Password</label>
                    <input type="password" name="password" required placeholder="Enter your password">
                </div>
                <div class="text-center">
                    <button id="loginBtn" type="submit" name="loginBtn">LOG IN</button>
                </div>
                <h6><a class="nav-link text-end pt-3 fs-small" href="">forgot password ?</a></h6>
            </form>
        </div>
    </div>
</body>

</html>