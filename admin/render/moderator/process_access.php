<?php
include "../connection.php"; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $user_id = $_GET["user_id"];

    // Get user data based on the user_id
    $selectSql = "SELECT * FROM users WHERE user_id = '$user_id'";
    $result = $conn->query($selectSql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Insert into 'moderator' table
        $insertSql = "INSERT INTO moderator 
                      (user_fullname, user_username, user_password, user_givenName, user_middleI, user_familyName, user_email, 
                       user_student_number, user_student_course, user_student_section, user_student_year, user_faculty_number, 
                       user_faculty_department, user_picture, user_created, user_modified, user_status, user_member_type, 
                       user_token, user_age, user_gender, user_birthday, user_bio)
                      VALUES 
                      ('{$row["user_fullname"]}', '{$row["user_username"]}', '{$row["user_password"]}', '{$row["user_givenName"]}', '{$row["user_middleI"]}', '{$row["user_familyName"]}', '{$row["user_email"]}', 
                       '{$row["user_student_number"]}', '{$row["user_student_course"]}', '{$row["user_student_section"]}', '{$row["user_student_year"]}', '{$row["user_faculty_number"]}', 
                       '{$row["user_faculty_department"]}', '{$row["user_picture"]}', '{$row["user_created"]}', '{$row["user_modified"]}', '{$row["user_status"]}', '{$row["user_member_type"]}', 
                       '{$row["user_token"]}', '{$row["user_age"]}', '{$row["user_gender"]}', '{$row["user_birthday"]}', '{$row["user_bio"]}')";

        if ($conn->query($insertSql)) {
            // If data is successfully inserted into 'moderator', delete from 'users'
            $deleteSql = "DELETE FROM users WHERE user_id = '$user_id'";
            if (!$conn->query($deleteSql)) {
                echo "Error deleting record: " . $conn->error;
            } else {
                echo "Data transferred successfully.";
                $redirectUrl = "../../moderator_account/dashboard.php";
                echo '<script type="text/javascript">';
                echo 'window.location.href = "' . $redirectUrl . '";';
                echo '</script>';
            }
        } else {
            echo "Error inserting into moderator: " . $conn->error;
        }
    } else {
        echo "User not found.";
    }
} else {
    echo "Invalid request.";
}

?>
