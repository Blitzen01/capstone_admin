<?php
    include '../../../render/connection.php';
    session_start();

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check if the user is logged in
        if (isset($_SESSION['username'])) {
            // Get the submitted data
            $username = $_SESSION['username'];
            $firstName = $_POST['first_name'];
            $lastName = $_POST['last_name'];
            $middleInitial = $_POST['middle_initial'];
            $birthday = $_POST['birthday'];
            $gender = $_POST['gender'];
            $email = $_POST['profile_email'];
            $facultyNumber = $_POST['profile_faculty_number'];
            $memberType = $_POST['profile_member_type'];
            $bio = $_POST['profile_bio'];

            // Update the database
            // Assuming your database connection is stored in $conn
            $query = "UPDATE moderator SET user_givenName=?, user_familyName=?, user_middleI=?, user_birthday=?, user_gender=?, user_email=?, user_faculty_number=?, user_member_type=?, user_bio=? WHERE user_username=?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ssssssssss", $firstName, $lastName, $middleInitial, $birthday, $gender, $email, $facultyNumber, $memberType, $bio, $username);
            $stmt->execute();

            // Check if the update was successful
            if ($stmt->affected_rows > 0) {
                $redirectUrl = "../../../admin/accountSettings.php";
                // Redirect back to the previous window using window.location
                echo '<script type="text/javascript">';
                echo 'window.location.href = "' . $redirectUrl . '";';
                echo '</script>';
            } else {
                echo '<script type="text/javascript">';
                echo "window.alert('No update has been made.');";
                $redirectUrl = "../../../admin/accountSettings.php";
                echo 'window.location.href = "' . $redirectUrl . '";';
                echo '</script>';
            }

            // Close statement and connection
            $stmt->close();
            $conn->close();
        } else {
            echo "User is not logged in.";
        }
    } else {
        echo "Form not submitted.";
    }
?>