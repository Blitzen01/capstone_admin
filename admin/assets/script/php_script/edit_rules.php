<?php
    include '../../../render/connection.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check if the 'subText' and 'id' fields are not empty
        if (!empty($_POST['subText']) && isset($_POST['id'])) {
            // Retrieve the updated subText from the form
            $updatedSubText = $_POST['subText'];
            
            // Retrieve the ID of the record to be updated
            $id = $_POST['id'];

            // Prepare SQL statement
            $stmt = $conn->prepare("UPDATE librarypages SET subText = ? WHERE id = ?");
            $stmt->bind_param("si", $updatedSubText, $id);

            // Execute SQL statement
            if ($stmt->execute() === TRUE) {
                $redirectUrl = "../../../libraryPages/about.php";
                // Redirect back to the previous window using window.location
                echo '<script type="text/javascript">';
                echo 'window.location.href = "' . $redirectUrl . '";';
                echo '</script>';
            } else {
                echo "Error: " . $stmt->error;
            }

            // Close statement and connection
            $stmt->close();
            $conn->close();
        } else {
            echo "Subtext field is empty or ID is missing.";
        }
    } else {
        echo "Form submission failed.";
    }
?>
