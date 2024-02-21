<?php

include '../../../render/connection.php';
session_start();

    if(isset($_POST['upload_profile_picture'])) {
        $user = $_SESSION['username'];
        $target_dir = "../../../moderator_account/moderator_profile_picture/";
        $target_file = $target_dir . basename($_FILES["profile_picture"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["profile_picture"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["profile_picture"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
        // if everything is ok, try to upload file
        } else {
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
                $previous_file = $target_dir . $previous_picture;
                if (file_exists($previous_file)) {
                    unlink($previous_file);
                }
            }

            // Upload new image
            if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file)) {
                $sql = "UPDATE moderator SET user_picture = ? WHERE user_username = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ss", $_FILES["profile_picture"]["name"], $user);
                if ($stmt->execute()) {
                    
                }
            }
        }
    }

    $redirectUrl = "../../../admin/accountSettings.php";
    // Redirect back to the previous window using window.location
    echo '<script type="text/javascript">';
    echo 'window.location.href = "' . $redirectUrl . '";';
    echo '</script>';
?>