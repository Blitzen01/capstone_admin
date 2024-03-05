<?php
    include '../render/connection.php';
    include '../assets/cdn/cdn_links.php';
    include '../assets/fonts/fonts.php';
    
    session_start();
    if (!isset($_SESSION['username_moderator'])) {
        header("Location: index.php"); // Redirect to the index if not logged in
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Books</title>

        <link rel="stylesheet" href="../assets/style/moderator_style.css">
        <link rel="stylesheet" href="../assets/style/style.css">
    </head>
    <body>
        <?php include 'moderator_nav/navbar.php'; ?>
        <div class="container-fluid pt-5 px-5">
            <div class="pt-5">
                <div class="px-3">
                    <h3>
                        Book List
                        <div class="text-end">
                            <button class="btn btn-success fs-small" data-bs-toggle="modal" data-bs-target="#updateBooksModal">Update Books List</button>
                        </div>
                    </h3>
                    <table id="book_list" class="table display responsive nowrap compact table-striped table-hover" width="100%">
                        <thead class="bg-success">
                            <tr>
                                <th>Access No.:</th>
                                <th>Book Title</th>
                                <th>Author:</th>
                                <th>Call No.:</th>
                                <th>Material Type:</th>
                                <th>Language:</th>
                                <th>Book Publication Details:</th>
                                <th>Description:</th>
                                <th>Content Type:</th>
                                <th>Media Type:</th>
                                <th>Carrier Type:</th>
                                <th>ISBN:</th>
                                <th>Subject(s):</th>
                                <th>LOC classification:</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql = "SELECT * FROM books";
                                $result = $conn->query($sql);

                                if($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row['book_access_number']?></td>
                                            <td><?php echo $row['book_title']?></td>
                                            <td><?php echo $row['book_author']?></td>
                                            <td><?php echo $row['book_call_number']?></td>
                                            <td><?php echo $row['book_material_type']?></td>
                                            <td><?php echo $row['book_language']?></td>
                                            <td><?php echo $row['book_publication_details']?></td>
                                            <td><?php echo $row['book_description']?></td>
                                            <td><?php echo $row['book_content_type']?></td>
                                            <td><?php echo $row['book_media_type']?></td>
                                            <td><?php echo $row['book_carrier_type']?></td>
                                            <td><?php echo $row['book_isbn']?></td>
                                            <td><?php echo $row['book_subject']?></td>
                                            <td><?php echo $row['book_classification']?></td>
                                        </tr>
                                        <?php
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>

    <script>
        $(document).ready(function() {
            // DataTable initialization for bookReserveTable
            var book_list = $('#book_list').DataTable({
                responsive: true,
            });
        });

        function checkPassword() {
        var passwordInput = document.getElementById('passwordInput').value;
        var passwordStatus = document.getElementById('passwordStatus');
        var submitButton = document.getElementById('submitButton');

        // Assuming $_SESSION['password_moderator'] is set in PHP
        <?php 
            // Start session if not already started
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $moderator_password = $_SESSION['password_moderator'];
        ?>

        console.log("Input password:", passwordInput);
        console.log("Moderator password:", "<?php echo $moderator_password; ?>");

        if (passwordInput === "<?php echo $moderator_password; ?>") {
            passwordStatus.innerHTML = "Password is correct";
            passwordStatus.style.color = "green";
            $('.book_update_password_confirm').click(function() {
                $('#updateBooksModal').modal('hide');
                $('#update_books_modal').modal('show');
            });
        } else {
            passwordStatus.innerHTML = "Password is incorrect";
            passwordStatus.style.color = "red";
        }
    }
    </script>
</html>