<div class="px-3">
                            <h3>E-Library Users</h3>
                            <div class="px-3">
                                <h4>Faculty</h4>
                                <table id="userList_faculty" class="table table-sm nowrap table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>First Name</th>
                                            <th>Lastname</th>
                                            <th>Username</th>
                                            <th>CvSu Email</th>
                                            <th>Faculty Department</th>
                                            <th>Faculty No.</th>
                                            <th>Member Type</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sql = "SELECT * FROM users WHERE user_member_type = 'Faculty'";
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
                            <div class="px-3">
                                <h4>Student</h4>
                                <table id="userList_student" class="table table-sm nowrap table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>First Name</th>
                                            <th>Lastname</th>
                                            <th>Username</th>
                                            <th>CvSu Email</th>
                                            <th>Course</th>
                                            <th>Student No.</th>
                                            <th>Member Type</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sql = "SELECT * FROM users WHERE user_member_type = 'Student'";
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
                        </div>