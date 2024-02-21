<?php
    include 'connection.php';
    include '../assets/cdn/cdn_links.php';
    include '../assets/fonts/fonts.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Upload Form</title>

        <link rel="stylesheet" href="../assets/style/style.css">
    </head>

    <body>
        <div class="container my-5 w-lg-40 card py-2">
        <span class="position-absolute end-0"><button onclick="cancelPost()" class="btn me-2"><i class="fa-solid fa-xmark"></i></button></span>
            <div class="text-center mb-3">
                <img src="../assets/image/cvsu_library.png" alt="" srcset="" style="width: 15rem;">
                
            </div>
            <h2 class="text-center">Upload Form</h2>
            <form method="post" enctype="multipart/form-data">
                <!-- Textbox -->
                <input class="form-control" type="text" name="text" id="text" placeholder="Title/Caption" autocomplete="off">

                <br><br>

                <!-- Image Upload -->
                <div class="input-group">
                    <input class="form-control" type="file" name="images[]" id="images" accept="image/*" multiple>
                    <label class="input-group-text" for="images">Images</label>
                </div>
                <br><br>

                <!-- Video Upload -->
                <div class="input-group">
                    <input class="form-control" type="file" name="videos[]" id="videos" accept="video/*" multiple>
                    <label class="input-group-text" for="videos">Videos</label>
                </div>

                <br><br>

                <!-- Iframe -->
                <label class="form-label" for="iframe">Embed Post</label>
                <textarea class="form-control" name="iframe" id="iframe" rows="4" cols="50" style="resize: none;" placeholder="Paste URL here"></textarea>

                <br><br>

                <!-- Submit Button -->
                <input class="btn btn-success" type="submit" value="Post" style="width: 100%;">
            </form>
        </div>


        <?php
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
                    $imageUploadDirectory = "uploads/images/";
                    $copyDirectory = "uploads/copy/";

                    // Create the copy directory if it doesn't exist
                    if (!file_exists($copyDirectory)) {
                        mkdir($copyDirectory, 0777, true);
                    }

                    foreach ($_FILES["images"]["tmp_name"] as $key => $tmp_name) {
                        $imageFileName = $_FILES["images"]["name"][$key];
                        $imageTmpName = $_FILES["images"]["tmp_name"][$key];

                        // Move the original file to the uploads/images/ directory
                        move_uploaded_file($imageTmpName, $imageUploadDirectory . $imageFileName);

                        // Make a copy of the original file and store it in the uploads/copy/ directory
                        copy($imageUploadDirectory . $imageFileName, $copyDirectory . $imageFileName);

                        $imageFileNames[] = $imageFileName;
                    }
                }

                // Process video uploads
                $videoFileNames = [];
                if (!empty($_FILES["videos"])) {
                    $videoUploadDirectory = "uploads/videos/";
                    $copyDirectory = "uploads/copy/";

                    // Create the copy directory if it doesn't exist
                    if (!file_exists($copyDirectory)) {
                        mkdir($copyDirectory, 0777, true);
                    }

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
                    echo "Data inserted successfully";
                    echo "<script>window.location.href = '../librarypages/home.php';</script>";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                $conn->close();
            }
        ?>

    </body>

    <script>
        function cancelPost() {
            window.history.back();
        }
    </script>
</html>
