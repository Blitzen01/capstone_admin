<?php
    include '../../../render/connection.php';

    // Get the current date and time
    $currentDateTime = date("Y-m-d H:i:s");

    // SQL query to delete events that have already passed
    $sql = "DELETE FROM events WHERE event_date < CURDATE() OR (event_date = CURDATE() AND event_timeTo < CURTIME())";

    if ($conn->query($sql) === TRUE) {
        $redirectUrl = "../../../librarypages/eventActivities.php";
        // Redirect back to the previous window using window.location
        echo '<script type="text/javascript">';
        echo 'window.location.href = "' . $redirectUrl . '";';
        echo '</script>';

    } else {
        echo "Error deleting records: " . $conn->error;
    }
?>