<?php
include '../../../render/connection.php';

if(isset($_POST['submit'])) {
    $newMission = $_POST['update_mission'];
    
    // Update the mission text in the database
    $updateSql = "UPDATE librarypages SET subText = '$newMission' WHERE mainText = 'mission'";
    $updateResult = mysqli_query($conn, $updateSql);

    if($updateResult) {
        $redirectUrl = "../../../libraryPages/about.php";
        // Redirect back to the previous window using window.location
        echo '<script type="text/javascript">';
        echo 'window.location.href = "' . $redirectUrl . '";';
        echo '</script>';
    } else {
        echo "Error updating mission: " . mysqli_error($conn);
    }
}
?>
