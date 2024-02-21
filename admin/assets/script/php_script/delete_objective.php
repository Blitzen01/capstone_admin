<?php
include '../../../render/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the 'id' field is not empty
    if (isset($_POST['id'])) {
        // Retrieve the ID of the record to be deleted
        $id = $_POST['id'];

        // Prepare SQL statement
        $stmt = $conn->prepare("DELETE FROM librarypages WHERE id = ?");
        $stmt->bind_param("i", $id);

        // Execute SQL statement
        if ($stmt->execute() === TRUE) {
            $redirectUrl = "../../../libraryPages/about.php";
            // Redirect back to the previous window using window.location
            echo '<script type="text/javascript">';
            echo 'window.location.href = "' . $redirectUrl . '";';
            echo '</script>';
        } else {
            // Delete failed
            echo "Error: " . $stmt->error;
        }

        // Close statement and connection
        $stmt->close();
        $conn->close();
    } else {
        echo "ID field is missing.";
    }
} else {
    echo "Form submission failed.";
}
?>
