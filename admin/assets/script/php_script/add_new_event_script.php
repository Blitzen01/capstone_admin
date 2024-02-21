<?php
    include '../../../render/connection.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = $_POST['title'];
        $timeFrom = $_POST['timeFrom'];
        $timeTo = $_POST['timeTo'];
        $date = $_POST['date'];
    
        $sql = "INSERT INTO events (event_title, event_timeFrom, event_timeTo, event_date) VALUES ('$title', '$timeFrom', '$timeTo', '$date')";
    
        if ($conn->query($sql) === TRUE) {
            $redirectUrl = "../../../librarypages/eventActivities.php";
            // Redirect back to the previous window using window.location
            echo '<script type="text/javascript">';
            echo 'window.location.href = "' . $redirectUrl . '";';
            echo '</script>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
?>