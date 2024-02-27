<?php
include '../../render/connection.php';
include '../../assets/cdn/cdn_links.php';
include '../../assets/fonts/fonts.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Update the reservation status in the bookreserve table
    updateBookReservation($conn, $id);
}

// Function to update the reservation status in the bookreserve table
function updateBookReservation($conn, $id)
{
    $sql = "UPDATE bookreserve 
            SET status = 'preparing'
            WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        $redirectUrl = "../../admin/circulation.php#bookReservation";
        // Redirect back to the previous window using window.location
        echo '<script type="text/javascript">';
        echo 'window.location.href = "' . $redirectUrl . '";';
        echo '</script>';
    } else {
        echo "Error updating record in bookreserve: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
