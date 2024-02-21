<?php
    include '../render/connection.php';
    include '../assets/cdn/cdn_links.php';
    include '../assets/fonts/fonts.php';

    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get selected values from the form
        $startDay = $_POST["startDay"];
        $endDay = $_POST["endDay"];
        $startTime = $_POST["startTime"];
        $endTime = $_POST["endTime"];
    
        // Check if default values were selected
        if ($startDay == "default" || $endDay == "default" || $startTime == "default" || $endTime == "default") {
            echo "<span class='text-danger'>Please select valid values for all fields.</span>";
            $redirectUrl = "../libraryPages/opacSearch.php";
            echo '<script type="text/javascript">';
            echo 'window.location.href = "' . $redirectUrl . '";';
            echo '</script>';
        } else {
            // Construct the update query
            $updateQuery = "UPDATE librarypages SET mainText = '$startDay - $endDay', subText = '$startTime - $endTime' WHERE links = 'libraryHours'";
    
            // Execute the update query
            if ($conn->query($updateQuery) === TRUE) {
                $redirectUrl = "../libraryPages/opacSearch.php";
                echo '<script type="text/javascript">';
                echo 'window.location.href = "' . $redirectUrl . '";';
                echo '</script>';
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }
    }
?>
