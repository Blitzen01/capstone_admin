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
<!-- New Moderator Modal -->
<div class="modal fade" id="new_moderator" tabindex="-1" aria-labelledby="new_moderator_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="new_moderator_modal">New Moderator</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../assets/script/php_script/new_moderator.php" method="post">
                    <div class="mb-3">
                        <label for="firstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="firstName" name="firstName" required autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="lastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lastName" name="lastName" required autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required autocomplete="off">
                    </div>
                    <hr>
                    <div class="text-end">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- New Moderator Modal -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>

        <link rel="stylesheet" href="../assets/style/moderator_style.css">
        <link rel="stylesheet" href="../assets/style/style.css">
    </head>
    <body>
        <?php include 'moderator_nav/navbar.php'; ?>
        <div class="container-fluid pt-5 px-5">
            <div class="pt-5">
                <div class="px-3">
                    <h3>Moderators</h3>
                    <button type="button" class="nav-link text-success" data-bs-toggle="modal" data-bs-target="#new_moderator"><i class="fa-solid fa-plus"></i> New Moderator</button>
                    <table id="moderatorList" class="table table-sm nowrap table-striped table-hover pb-3">
                        <thead>
                            <tr>
                                <th>Role</th>
                                <th>Permission</th>
                                <th>First Name</th>
                                <th>Lastname</th>
                                <th>Username</th>
                                <th>CvSu Email</th>
                                <th>Faculty No.</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sql = "SELECT * FROM moderator";

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
                                                    <td>
                                                        <a class="nav-link text-success" href="../render/moderator/editPermission.php?user_id=<?php echo $row['user_id']?>">Edit</a>
                                                    </td>
                                                    <td><?php echo $row["permission"]; ?></td>
                                                    <td><?php echo $row["user_givenName"]; ?></td>
                                                    <td><?php echo $row["user_familyName"]; ?></td>
                                                    <td><?php echo $row["user_username"]; ?></td>
                                                    <td><?php echo $row["user_email"]; ?></td>
                                                    <td><?php echo $row["user_faculty_number"]; ?></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        <?php
                                    } else {

                                    }
                                } else {
                                    // Display an error message if the query fails
                                    echo "Error: " . $conn->error;
                                }
                            ?>
                        </tbody>
                    </table>

                    <h3>E-Library Users</h3>
                    <table id="e_library_user" class="table table-sm nowrap table-striped table-hover">
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

                    <h3>Library Visitors</h3>
                    <table id="userView" class="table table-sm nowrap table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Member Type</th>
                                <th>Course/Department</th>
                                <th>ID number</th>
                                <th>Email</th>
                                <th>Date</th>
                                <th>Time in</th>
                                <th>Time out</th>
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
                                                    <td><?php echo $row['email']; ?></td>
                                                    <td><?php echo $row['date']; ?></td>
                                                    <td><?php echo $row['time_in']; ?></td>
                                                    <td><?php echo $row['time_out']; ?></td>
                                                </tr>
                                            <?php
                                        }
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
                var moderator =  $('#moderatorList').DataTable();
                var moderator =  $('#e_library_user').DataTable();
                var moderator =  $('#userView').DataTable();
        });
    </script>
</html>