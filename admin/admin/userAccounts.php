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
                        <div class="px-3">
                            <h3>Users</h3>
                            <table id="userList" class="table table-sm nowrap table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>First Name</th>
                                        <th>Lastname</th>
                                        <th>Username</th>
                                        <th>CvSu Email</th>
                                        <th>Course</th>
                                        <th>Student No.</th>
                                        <th>Faculty Department</th>
                                        <th>Faculty No.</th>
                                        <th>Member Type</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $sql = "SELECT * FROM users";
                                        $result = $conn->query($sql);

                                        // Check if the query was successful
                                        if ($result) {
                                            // Check if there are rows in the result set
                                            if ($result->num_rows > 0) {
                                                ?>
                                                    <?php
                                                    while ($row = $result->fetch_assoc()) {
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $row["user_givenName"]; ?></td>
                                                            <td><?php echo $row["user_familyName"]; ?></td>
                                                            <td><?php echo $row["user_username"] ?></td>
                                                            <td><?php echo $row["user_email"]; ?></td>
                                                            <td><?php echo $row["user_student_course"]; ?></td>
                                                            <td><?php echo $row["user_student_number"]; ?></td>
                                                            <td><?php echo $row["user_faculty_department"]; ?></td>
                                                            <td><?php echo $row["user_faculty_number"]; ?></td>
                                                            <td><?php echo $row["user_member_type"]; ?></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                <?php
                                            } else {
                                                echo "No records found.";
                                            }
                                        } else {
                                            // Display an error message if the query fails
                                            echo "Error: " . $conn->error;
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </section>
                
                    <section id="view">
                        <h1 id="pageHeader">View</h1>
                        <div class="px-3">
                            <h3>Library Visitors</h3>
                            <table id="userView" class="table table-sm nowrap table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Member Type</th>
                                        <th>Course/Department</th>
                                        <th>ID number</th>
                                        <th>Date</th>
                                        <th>Time in</th>
                                        <th>Time out</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $sql = "SELECT * FROM attendance_log";
                                        $result = $conn->query($sql);
                                        if($result){
                                            if($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $row['fullname']; ?></td>
                                                            <td><?php echo $row['member_type']; ?></td>
                                                            <td><?php echo $row['course_department']; ?></td>
                                                            <td><?php echo $row['id_number']; ?></td>
                                                            <td><?php echo $row['date']; ?></td>
                                                            <td><?php echo $row['time_in']; ?></td>
                                                            <td><?php echo $row['time_out']; ?></td>
                                                            <td><?php echo $row['email']; ?></td>
                                                        </tr>
                                                    <?php
                                                }
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
            $(document).ready(function() {
                var satisfactionTable =  $('#moderatorList').DataTable({
                    scrollX: (window.innerWidth <= 1500) ? true : false
                });
                var satisfactionTable =  $('#userList').DataTable({
                    scrollX: (window.innerWidth <= 1400) ? true : false
                });
                var satisfactionTable =  $('#userView').DataTable({
                    scrollX: (window.innerWidth <= 1400) ? true : false
                });
            });

        </script>
    </body>
</html>