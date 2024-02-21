<?php
include '../render/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['postId'])) {
        $postId = $_POST['postId'];

        // Fetch the post details
        $select_sql = "SELECT * FROM createpost WHERE id = $postId";
        $result = mysqli_query($conn, $select_sql);

        if ($result) {
            $row = mysqli_fetch_array($result);

            // Delete associated files (image and video)
            if (isset($row['image_url']) && !empty($row['image_url'])) {
                $images = explode(',', $row['image_url']);
                foreach ($images as $image) {
                    $imagePath = "../render/uploads/images/" . $image;
                    if (file_exists($imagePath)) {
                        unlink($imagePath);
                    }
                }
            }

            if (isset($row['video_url']) && !empty($row['video_url'])) {
                $videoPath = "../render/uploads/videos/" . $row['video_url'];
                if (file_exists($videoPath)) {
                    unlink($videoPath);
                }
            }

            // Delete the post from the database
            $delete_sql = "DELETE FROM createpost WHERE id = $postId";
            $delete_result = mysqli_query($conn, $delete_sql);

            if ($delete_result) {
                header("Location: ../libraryPages/home.php");
                exit();
            } else {
                echo 'Error deleting post: ' . mysqli_error($conn);
            }
        } else {
            echo 'Error fetching post details: ' . mysqli_error($conn);
        }
    } else {
        echo 'Post ID not provided.';
    }
} else {
    echo 'Invalid request method.';
}
?>
