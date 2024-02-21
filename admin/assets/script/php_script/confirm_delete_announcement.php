<?php
    include '../../../render/connection.php';

    if(isset($_POST['postId'])) {
        $postId = $_POST['postId'];

        // Fetch the post details
        $select_sql = "SELECT * FROM createpost WHERE id = $postId";
        $result = mysqli_query($conn, $select_sql);

        if ($result) {
            $row = mysqli_fetch_array($result);

            // Delete associated files (images)
            if (isset($row['image_url']) && !empty($row['image_url'])) {
                $images = explode(',', $row['image_url']);
                foreach ($images as $image) {
                    $imagePath = "../../../render/uploads/images/" . $image;
                    if (file_exists($imagePath)) {
                        unlink($imagePath);
                    }
                }
            }

            // Delete associated files (videos)
            if (isset($row['video_url']) && !empty($row['video_url'])) {
                $videoPath = "../../../render/uploads/videos/" . $row['video_url'];
                if (file_exists($videoPath)) {
                    unlink($videoPath);
                }
            }

            // Prepare the DELETE statement
            $delete_sql = "DELETE FROM createpost WHERE id = ?";
            
            // Bind parameters and execute the statement
            $stmt = mysqli_prepare($conn, $delete_sql);
            mysqli_stmt_bind_param($stmt, "i", $postId); // Assuming postId is an integer
            $success = mysqli_stmt_execute($stmt);

            if ($success) {
                $redirectUrl = "../../../libraryPages/home.php";
                // Redirect back to the previous window using window.location
                echo '<script type="text/javascript">';
                echo 'window.location.href = "' . $redirectUrl . '";';
                echo '</script>';
            } else {
                echo "Error deleting post: " . mysqli_error($conn);
            }

            // Close statement and connection
            mysqli_stmt_close($stmt);
        } else {
            echo "Error fetching post details: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
?>
