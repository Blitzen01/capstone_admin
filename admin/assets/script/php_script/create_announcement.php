<?php
    include '../../../render/connection.php';
    // Set the time zone to the Philippines (PH) time
    date_default_timezone_set('Asia/Manila');

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $text = isset($_POST["text"]) ? $_POST["text"] : "";
        $iframe = isset($_POST["iframe"]) ? $_POST["iframe"] : "";

        // Process image uploads
        $imageFileNames = [];
        if (!empty($_FILES["images"])) {
            $imageUploadDirectory = "../../../render/uploads/images/"; // Updated directory
            foreach ($_FILES["images"]["tmp_name"] as $key => $tmp_name) {
                $imageFileName = $_FILES["images"]["name"][$key];
                $imageTmpName = $_FILES["images"]["tmp_name"][$key];
                // Move the original file to the uploads/images/ directory
                move_uploaded_file($imageTmpName, $imageUploadDirectory . $imageFileName);
                $imageFileNames[] = $imageFileName;
            }
        }

        // Process video uploads
        $videoFileNames = [];
        if (!empty($_FILES["videos"])) {
            $videoUploadDirectory = "../../../render/uploads/videos/"; // Updated directory
            foreach ($_FILES["videos"]["tmp_name"] as $key => $tmp_name) {
                $videoFileName = $_FILES["videos"]["name"][$key];
                $videoTmpName = $_FILES["videos"]["tmp_name"][$key];
                // Move the original file to the uploads/videos/ directory
                move_uploaded_file($videoTmpName, $videoUploadDirectory . $videoFileName);
                $videoFileNames[] = $videoFileName;
            }
        }

        // Get the current date and time in 12-hour format
        $currentDateTime = date("m/d/Y h:i A");

        // Perform SQL injection prevention (use prepared statements)
        $text = $conn->real_escape_string($text);
        $imageFileNames = $conn->real_escape_string(implode(",", $imageFileNames));
        $videoFileNames = $conn->real_escape_string(implode(",", $videoFileNames));
        $iframe = $conn->real_escape_string($iframe);

        // Omit timestamp from the SQL query
        $sql = "INSERT INTO createpost (text, image_url, video_url, embed_code) VALUES ('$text', '$imageFileNames', '$videoFileNames', '$iframe')";

        if ($conn->query($sql) === TRUE) {
            $redirectUrl = "../../../libraryPages/home.php"; // Updated redirect URL
            // Redirect back to the previous window using window.location
            echo '<script type="text/javascript">';
            echo 'window.location.href = "' . $redirectUrl . '";';
            echo '</script>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
?>
