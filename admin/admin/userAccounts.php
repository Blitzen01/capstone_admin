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
        <title>Circulation</title>

        <link rel="stylesheet" href="../assets/style/style.css">
    </head>
    
    <body>
        <?php include '../adminNavigation/header.php'; ?>

        <div id="admin-body" class="mt-5">
            <div class="row mt-2">
                <div class="col-lg-3">
                    <?php include '../adminNavigation/sidebar.php'; ?>
                </div>
                <div class="col-lg-9">
                    <section id="list">
                        <h1 id="pageHeader">List</h1>
                        <?php include '../web_content/userList.php'; ?>
                    </section>
                
                    <section id="view">
                        <h1 id="pageHeader">View</h1>
                        <?php include '../web_content/userView.php'; ?>
                    </section>
                </div>
            </div>
        </div>

        <script src="../assets/script/script.js"></script>

        <script>
            $(document).ready(function() {
                var satisfactionTable =  $('#moderatorList').DataTable({
                    scrollX: (window.innerWidth <= 1500) ? true : false
                });
                var satisfactionTable =  $('#userList_faculty').DataTable({
                    scrollX: (window.innerWidth <= 1400) ? true : false
                });
                var satisfactionTable =  $('#userList_student').DataTable({
                    scrollX: (window.innerWidth <= 1400) ? true : false
                });
                var satisfactionTable =  $('#userView').DataTable({
                    scrollX: (window.innerWidth <= 1400) ? true : false
                });
            });

            function get_student_details(userId) {
                // AJAX request to fetch user details by userId
                // Assuming you have a PHP file named getUserDetails.php to handle this request
                $.ajax({
                    url: '../assets/script/php_script/get_student_details.php',
                    type: 'post',
                    data: {
                        userId: userId
                    },
                    success: function(response) {
                        $('#userDetails').html(response);
                        $('#userModal').modal('show'); // Show modal with user details
                    }
                });
            }

            function get_faculty_details(userId) {
                // AJAX request to fetch user details by userId
                // Assuming you have a PHP file named getUserDetails.php to handle this request
                $.ajax({
                    url: '../assets/script/php_script/get_faculty_details.php',
                    type: 'post',
                    data: {
                        userId: userId
                    },
                    success: function(response) {
                        $('#userDetails').html(response);
                        $('#userModal').modal('show'); // Show modal with user details
                    }
                });
            }
        </script>
    </body>
</html>