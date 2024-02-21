<?php
    include '../../../render/connection.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check if link_url and link_title are set and not empty
        if (isset($_POST['link_url']) && isset($_POST['link_title']) && !empty($_POST['link_url']) && !empty($_POST['link_title'])) {
            // Sanitize the inputs
            $link_url = mysqli_real_escape_string($conn, $_POST['link_url']);
            $link_title = mysqli_real_escape_string($conn, $_POST['link_title']);
            // Retrieve the id from the form
            $id = mysqli_real_escape_string($conn, $_POST['link_id']);
            
            // Update the link in the database
            $update_sql = "UPDATE librarypages SET subText = '$link_title', links = '$link_url' WHERE id = '$id'";
            $update_result = mysqli_query($conn, $update_sql);

            if ($update_result) {
                $redirectUrl = "../../../librarypages/links.php";
                // Redirect back to the previous window using window.location
                echo '<script type="text/javascript">';
                echo 'window.location.href = "' . $redirectUrl . '";';
                echo '</script>';
            } else {
                // Handle query execution errors here.
                echo 'Error updating the link: ' . mysqli_error($conn);
            }
        } else {
            echo "Please provide both link URL and link title.";
        }
    }
?>
