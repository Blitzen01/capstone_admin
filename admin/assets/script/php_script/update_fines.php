<?php
include '../../../render/connection.php';

    if(isset($_POST["userType"]) && isset($_POST["bookType"]) && isset($_POST["fine"])) {
        // Get form data
        $userType = $_POST["userType"];
        $bookType = $_POST["bookType"];
        $fine = $_POST["fine"];

        // SQL query to insert data into librarypages table
        $sql = "UPDATE librarypages SET links='$fine' WHERE mainText='$userType' AND subText='$bookType'";

        if ($conn->query($sql) === TRUE) {
            $redirectUrl = "../../../libraryPages/opacSearch.php";
            // Redirect back to the previous window using window.location
            echo '<script type="text/javascript">';
            echo 'window.location.href = "' . $redirectUrl . '";';
            echo '</script>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Form data is not complete.";
    }
?>