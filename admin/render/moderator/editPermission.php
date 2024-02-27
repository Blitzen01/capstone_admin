<?php
    include '../../render/connection.php';
    include '../../assets/cdn/cdn_links.php';
    include '../../assets/fonts/fonts.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Permission</title>

        <link rel="stylesheet" href="../../assets/sty/estyle.css">
    </head>
    <body>
        <div class="container text-center py-5">
            <div class="col-sm-10 col-lg-6 text-start border border-secondary rounded ps-5 mx-auto">
                <div class="text-end">
                    <a class="nav-link p-3" href="../../moderator_account/dashboard.php"><i class="fa-solid fa-x"></i></a>
                </div>
                <?php
                    if (isset($_GET["user_id"])) {
                        $user_id = $_GET["user_id"];
                    }
                    
                    // Use prepared statement to avoid SQL injection
                    $sql = "SELECT * FROM moderator WHERE user_id = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("s", $user_id);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if($result) {
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<p><strong>First Name: </strong>" . $row['user_givenName'] . "</p> ";
                                echo "<p><strong>Last Name: </strong>" . $row['user_familyName'] . "</p> ";
                                echo "<p><strong>User Name: </strong>" . $row['user_username'] . "</p> ";
                                echo "<p><strong>Email: </strong>" . $row['user_email'] . "</p> ";
                                echo "<p><strong>Faculty Number: </strong>" . $row['user_faculty_number'] . "</p> ";
                                echo "<p><strong>Member Type: </strong>" . $row['user_member_type'] . "</p> ";
                            }
                            ?>
                            <!-- Button to insert data into bookborrowed table -->
                            <form method="post">
                                <div class="px-3">
                                    <label for="permissionOption">Permission Options:</label>
                                    <select class="form-control" id="permissionOption" name="selectedOption">
                                        <option value="default" disabled selected>Select an option</option>
                                        <option value="Administrator">Administrator</option>
                                        <option value="Librarian">Librarian</option>
                                        <option value="Assistant Librarian">Assistant Librarian</option>
                                        <option value="Staff">Staff</option>
                                        <option value="Remove Access">Remove Access(from Admin)</option>
                                    </select>
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-success m-3" name="update_button">SAVE</button>
                                </div>
                            </form>
                        <?php
                            if (isset($_POST['update_button'])) {
                                // Update the 'permission' column in the moderator table
                                $permission = $_POST["selectedOption"];
                                
                                if($permission != "default") {
                                    if($permission == "Remove Access") {
                                        $redirectUrl = "remove_access.php?user_token=$user_id";
                                            echo '<script type="text/javascript">';
                                            echo 'window.location.href = "' . $redirectUrl . '";';
                                            echo '</script>';
                                    } else {
                                        // Use prepared statement to avoid SQL injection
                                        $updateSql = "UPDATE moderator SET permission = ? WHERE user_id = ?";
                                        $updateStmt = $conn->prepare($updateSql);
                                        $updateStmt->bind_param("ss", $permission, $user_id);
                                        if ($updateStmt->execute()) {
                                            echo "Permission updated successfully.";
                                            $redirectUrl = "../../moderator_account/dashboard.php";
                                            echo '<script type="text/javascript">';
                                            echo 'window.location.href = "' . $redirectUrl . '";';
                                            echo '</script>';
                                        } else {
                                            echo "Error updating permission: " . $updateStmt->error;
                                        }

                                        // Close the prepared statement
                                        $updateStmt->close();
                                    }
                                    
                                } else {
                                    echo "<p class='text-danger'>Please select a valid option.</p>";
                                }
                                
                            }
                        }
                    }
                ?>
            </div>
        </div>
    </body>
</html>