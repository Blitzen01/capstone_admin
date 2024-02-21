<?php
    include '../../../render/connection.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check if link_id is set and not empty
        if (isset($_POST['link_id']) && !empty($_POST['link_id'])) {
            // Sanitize the input
            $id = mysqli_real_escape_string($conn, $_POST['link_id']);
            
            // Delete the link from the database
            $delete_sql = "DELETE FROM librarypages WHERE id = '$id'";
            $delete_result = mysqli_query($conn, $delete_sql);

            if ($delete_result) {
                $redirectUrl = "../../../librarypages/links.php";
                // Redirect back to the previous window using window.location
                echo '<script type="text/javascript">';
                echo 'window.location.href = "' . $redirectUrl . '";';
                echo '</script>';
            } else {
                // Handle query execution errors here.
                echo 'Error deleting the link: ' . mysqli_error($conn);
            }
        } else {
            echo "Please provide the link ID.";
        }
    }
?>
