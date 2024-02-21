<?php
include '../../../render/connection.php';

// Check if postId is set in the URL parameters
if (isset($_GET['postId'])) {
    $postId = $_GET['postId'];

    // Fetch the post details based on the post ID
    $select_sql = "SELECT * FROM createpost WHERE id = $postId";
    $result = mysqli_query($conn, $select_sql);

    if ($result) {
        $row = mysqli_fetch_array($result);

        // Start building the HTML content
        $html = '<p>Are you sure you want to delete the following announcement?</p>';
        $html .= '<div class="col card m-3 p-2">';
        $html .= '<div class="mb-3 pb-3 px-auto text-center">';
        if (isset($row['text'])) {
            $html .= '<p>' . $row['text'] . '</p>';
        }
        if (isset($row['image_url']) && !empty($row['image_url'])) {
            $images = explode(',', $row['image_url']);
            if (!empty($images)) {
                foreach ($images as $image) {
                    $html .= '<img src="../render/uploads/images/' . $image . '" alt="" srcset="" class="mb-2">';
                }
            }
        }
        if (isset($row['video_url']) && !empty($row['video_url'])) {
            $html .= '<video width="100%" height="auto" controls class="mb-2">';
            $html .= '<source src="../render/uploads/videos/' . $row['video_url'] . '" type="video/mp4">';
            $html .= 'Your browser does not support the video tag.';
            $html .= '</video>';
        }
        if (isset($row['embed_code']) && !empty($row['embed_code'])) {
            $html .= '<div class="embed-container">';
            $html .= $row['embed_code'];
            $html .= '</div>';
        }
        $html .= '</div>';
        $html .= '<div class="modal-footer">';
        $html .= "<form action='../assets/script/php_script/confirm_delete_announcement.php' method='post'>";
        $html .= "<input type='text' name='postId' id='postId' value='$postId' hidden>";
        $html .= '<button type="submit" class="btn btn-danger delete-post">Delete</button>';
        $html .= '</form></div>';
        $html .= '</div>';
        echo $html;
    }
}
?>
