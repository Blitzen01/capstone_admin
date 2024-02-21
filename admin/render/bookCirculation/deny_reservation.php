<?php
    include '../../render/connection.php';
    include '../../assets/cdn/cdn_links.php';
    include '../../assets/fonts/fonts.php';

    if (isset($_GET['id'])) {
        date_default_timezone_set('Asia/Manila');

        // Get the current date
        $currentDate = date('Y-m-d');

        $id = $_GET['id'];
        $libraryId = $_GET['libraryId'];
        $name = $_GET['name'];
        $course = $_GET['course'];
        $email = $_GET['email'];
        $accessNo = $_GET['accessNo'];
        $title = $_GET['title'];
        $callno = $_GET['callno'];
        $pickupDate = $_GET['pickupDate'];
        $dueDate = $_GET['returnDate'];
        $returnDate = $currentDate;
        $remarksOption = $_GET['selectedOption'];

        insertIntoBookTransaction($conn, $id, $libraryId, $name, $course, $email, $accessNo, $title, $callno, $pickupDate, $dueDate, $returnDate, $remarksOption);
    }

    // Function to insert data into the booktransaction table
    function insertIntoBookTransaction($conn, $id, $libraryId, $name, $course, $email, $accessNo, $title, $callno, $pickupDate, $dueDate, $returnDate, $remarks)
    {
        $sql = "INSERT INTO booktransaction (id, libraryid, name, courseSection, email, bookAccessNo, bookTitle, bookcallNo, pickupDate, dueDate, returnDate, remarks) 
                VALUES ('$id', '$libraryId', '$name', '$course', '$email', '$accessNo', '$title', '$callno', '$pickupDate', '$dueDate', '$returnDate', '$remarks')";

        if ($conn->query($sql) === TRUE) {
            // Delete the record from the bookreserve table
            $deleteSql = "DELETE FROM bookreserve WHERE id = '$id'";
            if ($conn->query($deleteSql) === TRUE) {
                $redirectUrl = "../../admin/circulation.php#bookReservation";
                // Redirect back to the previous window using window.location
                echo '<script type="text/javascript">';
                echo 'window.location.href = "' . $redirectUrl . '";';
                echo '</script>';
            } else {
                echo "Error deleting record from bookreserve: " . $conn->error;
            }
        } else {
            echo "Error inserting record into bookborrowed: " . $conn->error;
        }
    }

?>