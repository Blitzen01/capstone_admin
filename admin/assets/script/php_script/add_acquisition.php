<?php
    include '../../../render/connection.php';

    // Check if form data is received
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Escape user inputs for security
        $author = $conn->real_escape_string($_POST['author']);
        $year_publish = $conn->real_escape_string($_POST['year_publish']);
        $year_acquired = $conn->real_escape_string($_POST['year_acquired']);
        $title = $conn->real_escape_string($_POST['title']);

        // Insert data into database
        $sql = "INSERT INTO acquisition (author, year_publish, year_acquired, title) VALUES ('$author', '$year_publish', '$year_acquired', '$title')";
        if ($conn->query($sql) === TRUE) {
            $redirectUrl = "../../../librarypages/acquisition.php";
            // Redirect back to the previous window using window.location
            echo '<script type="text/javascript">';
            echo 'window.location.href = "' . $redirectUrl . '";';
            echo '</script>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Close connection
    $conn->close();
?>
