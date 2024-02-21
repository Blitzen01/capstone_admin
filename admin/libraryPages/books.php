<?php
    include '../render/connection.php';
    include '../assets/cdn/cdn_links.php';
    include '../assets/fonts/fonts.php';

    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: ../index.php"); // Redirect to the index if not logged in
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Books</title>

        <link rel="stylesheet" href="../assets/style/style.css">
    </head>

    <body>
        <?php include '../adminNavigation/header.php' ?>

        <div id="admin-body" class="pt-2">
            <div class="row pt-5">
                <div class="col-lg-3">
                    <?php include '../adminNavigation/sidebar.php'; ?>
                </div>
                <div class="col-lg-9">
                    <section>
                        <h1 id="pageHeader">Books</h1>
                        <div class="container px-5">
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
                    </section>
                </div>
            </div>
        </div>
        
        <script src="../assets/script/script.js"></script>

        <script>
            $(document).ready(function () {
                // DataTable initialization for bookReserveTable
                var book_list = $('#book_list').DataTable({
                    responsive: true,
                });
            });
        </script>
    </body>
</html>