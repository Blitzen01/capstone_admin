<?php
    include '../../../render/connection.php';

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form data
        $linkType = isset($_POST['linkType']) ? $_POST['linkType'] : null;
        $linkTitle = $_POST['linkTitle'];
        $linkURL = $_POST['linkURL'];

        if ($linkType === null || $linkType === "default") {
            // Display an alert if 'linkType' is null or equal to "default"
            $redirectUrl = "../../../librarypages/links.php";
            echo "<script>alert('Please select a valid option');";
            // Redirect back to the previous window using window.location
            echo 'window.location.href = "' . $redirectUrl . '";';
            echo '</script>';
            exit();
        }

        if($linkType !== "default") {
            // SQL to insert data into librarypages table
            $sql = "INSERT INTO librarypages (pages, mainText, subText, links) VALUES ('links', '$linkType', '$linkTitle', '$linkURL')";

            if ($conn->query($sql) === TRUE) {
                $redirectUrl = "../../../librarypages/links.php";
                // Redirect back to the previous window using window.location
                echo '<script type="text/javascript">';
                echo 'window.location.href = "' . $redirectUrl . '";';
                echo '</script>';
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Please select a valid option";
        }
    }
?>
