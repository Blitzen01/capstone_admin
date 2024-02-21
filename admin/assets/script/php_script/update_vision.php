<?php
include '../../../render/connection.php';

if(isset($_POST['submit'])) {
    $newVision = $_POST['update_vision'];
    
    // Update the vision text in the database
    $updateSql = "UPDATE librarypages SET subText = '$newVision' WHERE mainText = 'vision'";
    $updateResult = mysqli_query($conn, $updateSql);

    if($updateResult) {
        $redirectUrl = "../../../libraryPages/about.php";
        // Redirect back to the previous window using window.location
        echo '<script type="text/javascript">';
        echo 'window.location.href = "' . $redirectUrl . '";';
        echo '</script>';
    } else {
        echo "Error updating vision: " . mysqli_error($conn);
    }
}
?>
