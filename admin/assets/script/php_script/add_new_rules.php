<?php
include '../../../render/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the 'add_objective' field is not empty
    if (!empty($_POST['add_rules'])) {
        // Retrieve objective from the form
        $objective = $_POST['add_rules'];

        // Prepare SQL statement
        $stmt = $conn->prepare("INSERT INTO librarypages (pages, mainText, subText) VALUES ('about', 'rules', ?)");
        
        // Bind parameters
        $stmt->bind_param("s", $objectiveValue);
        
        // Set the value of $objectiveValue
        $objectiveValue = $objective;

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
        echo "Objective field is empty.";
    }
} else {
    echo "Form submission failed.";
}
?>
