<!--logout Modal -->
<div class="modal fade" id="adminLogOut" tabindex="-1" aria-labelledby="adminLogOutLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title fs-5" id="adminLogOutLabel">Confirm Log out</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" ><a class="nav-link" href="../admin/logout.php">Log out</a></button>
            </div>
        </div>
    </div>
</div>
<!--logout Modal -->

<!-- Process Reservation Modal -->
<div class="modal fade" id="process_reservation" tabindex="-1" aria-labelledby="process_reservation_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="process_reservation_modal">Process Reservation</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>ID:</strong> <span id="process_modalId"></span></p>
                <p><strong>Library ID:</strong> <span id="process_modalLibraryId"></span></p>
                <p><strong>Name:</strong> <span id="process_modalName"></span></p>
                <p><strong>Course:</strong> <span id="process_modalCourse"></span></p>
                <p><strong>Email:</strong> <span id="process_modalEmail"></span></p>
                <p><strong>Access No.:</strong> <span id="process_modalAccessNo"></span></p>
                <p><strong>Tittle:</strong> <span id="process_modalTittle"></span></p>
                <p><strong>Call No.:</strong> <span id="process_modalCallNo"></span></p>
                <p><strong>Pick up Date:</strong> <span id="process_modalPickUpDate"></span></p>
                <p><strong>Return Date:</strong> <span id="process_modalReturnDate"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success">Pick Up</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Process Reservation Modal -->

<!-- Deny Reservation Modal -->
<div class="modal fade" id="deny_reservation" tabindex="-1" aria-labelledby="deny_reservation_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deny_reservation_modal">Decline Reservation</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>ID:</strong> <span id="deny_modalId"></span></p>
                <p><strong>Library ID:</strong> <span id="deny_modalLibraryId"></span></p>
                <p><strong>Name:</strong> <span id="deny_modalName"></span></p>
                <p><strong>Course:</strong> <span id="deny_modalCourse"></span></p>
                <p><strong>Email:</strong> <span id="deny_modalEmail"></span></p>
                <p><strong>Access No.:</strong> <span id="deny_modalAccessNo"></span></p>
                <p><strong>Tittle:</strong> <span id="deny_modalTittle"></span></p>
                <p><strong>Call No.:</strong> <span id="deny_modalCallNo"></span></p>
                <p><strong>Pick up Date:</strong> <span id="deny_modalPickUpDate"></span></p>
                <p><strong>Return Date:</strong> <span id="deny_modalReturnDate"></span></p>
                <form method="post">
                    <div class="px-3">
                        <label for="declineOption">Decline Options:</label>
                        <select class="form-control" id="declineOption" name="selectedOption">
                            <option value="default" selected>Select an option</option>
                            
                            <!-- The student may have violated library policies, such as having outstanding fines or overdue materials,
                            preventing them from borrowing additional books until the issues are resolved. -->
                            <option value="Policy Violation">Policy Violation</option>

                            <!-- The student may have initially reserved the book but later canceled the request due to a change of mind
                            or a decision to use alternative resources. -->
                            <option value="Reservation Cancellation">Reservation Cancellation</option>

                            <!-- The student may have lost the book and is in the process of resolving the issue with the library, making
                            it temporarily unavailable until the matter is resolved. -->
                            <option value="Lost Book">Lost Book</option>

                            <!-- If the library is closed for a holiday, maintenance, or any other reason, students may not be able to access 
                            or borrow books during that time. -->
                            <option value="Library Closure">Library Closure</option>
                        </select>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger">Decline</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Deny Reservation Modal -->

<!-- Damage Book Modal -->
<div class="modal fade" id="book_damage" tabindex="-1" aria-labelledby="book_damage_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="book_damage_modal">Damage Book</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>ID:</strong> <span id="damage_modalId"></span></p>
                <p><strong>Library ID:</strong> <span id="damage_modalLibraryId"></span></p>
                <p><strong>Name:</strong> <span id="damage_modalName"></span></p>
                <p><strong>Course:</strong> <span id="damage_modalCourse"></span></p>
                <p><strong>Email:</strong> <span id="damage_modalEmail"></span></p>
                <p><strong>Access No.:</strong> <span id="damage_modalAccessNo"></span></p>
                <p><strong>Tittle:</strong> <span id="damage_modalTittle"></span></p>
                <p><strong>Call No.:</strong> <span id="damage_modalCallNo"></span></p>
                <p><strong>Pick up Date:</strong> <span id="damage_modalPickUpDate"></span></p>
                <p><strong>Due Date:</strong> <span id="damage_modalDueDate"></span></p>
                <p><strong>Return Date:</strong> <span id="damage_modalReturnDate"></span></p>
                <p><strong>Fine:</strong> <span id="damage_modalfine"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger">Damage</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Damage Book Modal -->

<!-- Missing Book Modal -->
<div class="modal fade" id="book_missing" tabindex="-1" aria-labelledby="book_missing_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="book_missing_modal">Missing Book</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>ID:</strong> <span id="missing_modalId"></span></p>
                <p><strong>Library ID:</strong> <span id="missing_modalLibraryId"></span></p>
                <p><strong>Name:</strong> <span id="missing_modalName"></span></p>
                <p><strong>Course:</strong> <span id="missing_modalCourse"></span></p>
                <p><strong>Email:</strong> <span id="missing_modalEmail"></span></p>
                <p><strong>Access No.:</strong> <span id="missing_modalAccessNo"></span></p>
                <p><strong>Tittle:</strong> <span id="missing_modalTittle"></span></p>
                <p><strong>Call No.:</strong> <span id="missing_modalCallNo"></span></p>
                <p><strong>Pick up Date:</strong> <span id="missing_modalPickUpDate"></span></p>
                <p><strong>Due Date:</strong> <span id="missing_modalDueDate"></span></p>
                <p><strong>Return Date:</strong> <span id="missing_modalReturnDate"></span></p>
                <p><strong>Fine:</strong> <span id="missing_modalfine"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning">Missing</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Missing Book Modal -->

<!-- Return Book Modal -->
<div class="modal fade" id="book_return" tabindex="-1" aria-labelledby="book_return_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="book_return_modal">Return Book</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>ID:</strong> <span id="return_modalId"></span></p>
                <p><strong>Library ID:</strong> <span id="return_modalLibraryId"></span></p>
                <p><strong>Name:</strong> <span id="return_modalName"></span></p>
                <p><strong>Course:</strong> <span id="return_modalCourse"></span></p>
                <p><strong>Email:</strong> <span id="return_modalEmail"></span></p>
                <p><strong>Access No.:</strong> <span id="return_modalAccessNo"></span></p>
                <p><strong>Tittle:</strong> <span id="return_modalTittle"></span></p>
                <p><strong>Call No.:</strong> <span id="return_modalCallNo"></span></p>
                <p><strong>Pick up Date:</strong> <span id="return_modalPickUpDate"></span></p>
                <p><strong>Due Date:</strong> <span id="return_modalDueDate"></span></p>
                <p><strong>Return Date:</strong> <span id="return_modalReturnDate"></span></p>
                <p><strong>Fine:</strong> <span id="return_modalfine"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="book_return">Return</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Return Book Modal -->

<!-- edit opac background Modal -->
<div class="modal fade" id="opac_bg_modal" tabindex="-1" aria-labelledby="opac_bg_modal_label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="opac_bg_modal_label">Update Opac Search Background</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" enctype="multipart/form-data" action="../render/updateOpacSearch/updateOpacImage.php">
            <input type="hidden" name="mainText" value="<?php echo $mainText; ?>">
            <input type="hidden" name="pages" value="<?php echo $pages; ?>">

            <div class="input-group p-3">
                <label class="input-group-text" for="image">Upload</label>
                <input class="form-control" type="file" name="image" id="image" accept="image/*">
            </div>

            <hr>
            <div class="text-end">
                <button type="submit" class="btn btn-success" name="opac_bg_save">Save changes</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- edit opac background Modal -->

<!-- library hours Modal -->
<div class="modal fade" id="library_hours_modal" tabindex="-1" aria-labelledby="library_hours_modal_label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container p-3">
                <h3 class="text-center">Update Library Hours Schedule</h3>
                <form action="../render/editLibraryHours.php" method="post">
                    <!-- select day schedule -->
                    <div class="row">
                        <div class="col">
                            <label for="startDay">Select start day:</label>
                            <select id="startDay" name="startDay" class="form-select">
                                <option value="default">Select option</option>
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday</option>
                                <option value="Thursday">Thursday</option>
                                <option value="Friday">Friday</option>
                                <option value="Saturday">Saturday</option>
                                <option value="Sunday">Sunday</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="endDay">Select end day:</label>
                            <select id="endDay" name="endDay" class="form-select">
                                <option value="default">Select option</option>
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday</option>
                                <option value="Thursday">Thursday</option>
                                <option value="Friday">Friday</option>
                                <option value="Saturday">Saturday</option>
                                <option value="Sunday">Sunday</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <!-- select time schedule -->
                            <label for="startTime">Select start time:</label>
                            <select id="startTime" name="startTime" class="form-select">
                                <!-- Options for hours from 7 AM to 6:30 PM in both 24-hour and 12-hour format -->
                                <<option value="default">Select option</option>
                                <option value="06:00">6:00 AM</option>
                                <option value="06:30">6:30 AM</option>
                                <option value="07:00">7:00 AM</option>
                                <option value="07:30">7:30 AM</option>
                                <option value="08:00">8:00 AM</option>
                                <option value="08:30">8:30 AM</option>
                                <option value="09:00">9:00 AM</option>
                                <option value="09:30">9:30 AM</option>
                                <option value="10:00">10:00 AM</option>
                                <option value="10:30">10:30 AM</option>
                                <option value="11:00">11:00 AM</option>
                                <option value="11:30">11:30 AM</option>
                                <option value="12:00">12:00 PM</option>
                                <option value="12:30">12:30 PM</option>
                                <option value="13:00">1:00 PM</option>
                                <option value="13:30">1:30 PM</option>
                                <option value="14:00">2:00 PM</option>
                                <option value="14:30">2:30 PM</option>
                                <option value="15:00">3:00 PM</option>
                                <option value="15:30">3:30 PM</option>
                                <option value="16:00">4:00 PM</option>
                                <option value="16:30">4:30 PM</option>
                                <option value="17:00">5:00 PM</option>
                                <option value="17:30">5:30 PM</option>
                                <option value="18:00">6:00 PM</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="endTime">Select end time:</label>
                            <select id="endTime" name="endTime" class="form-select">
                                <!-- Options for hours from 7 AM to 6:30 PM in both 24-hour and 12-hour format -->
                                <option value="default">Select option</option>
                                <option value="06:00">6:00 AM</option>
                                <option value="06:30">6:30 AM</option>
                                <option value="07:00">7:00 AM</option>
                                <option value="07:30">7:30 AM</option>
                                <option value="08:00">8:00 AM</option>
                                <option value="08:30">8:30 AM</option>
                                <option value="09:00">9:00 AM</option>
                                <option value="09:30">9:30 AM</option>
                                <option value="10:00">10:00 AM</option>
                                <option value="10:30">10:30 AM</option>
                                <option value="11:00">11:00 AM</option>
                                <option value="11:30">11:30 AM</option>
                                <option value="12:00">12:00 PM</option>
                                <option value="12:30">12:30 PM</option>
                                <option value="13:00">1:00 PM</option>
                                <option value="13:30">1:30 PM</option>
                                <option value="14:00">2:00 PM</option>
                                <option value="14:30">2:30 PM</option>
                                <option value="15:00">3:00 PM</option>
                                <option value="15:30">3:30 PM</option>
                                <option value="16:00">4:00 PM</option>
                                <option value="16:30">4:30 PM</option>
                                <option value="17:00">5:00 PM</option>
                                <option value="17:30">5:30 PM</option>
                                <option value="18:00">6:00 PM</option>
                            </select>
                        </div>
                    </div>

                    <hr>
                    <div class="text-end">
                        <input class="btn btn-success" type="submit" value="UPDATE">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
      </div>
    </div>
  </div>
</div>
<!-- library hourse Modal -->

<!-- moderator logout Modal -->
<div class="modal fade" id="confirmLogoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm Logout</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to logout?
      </div>
      <div class="modal-footer">
        <a href="logout.php" class="btn btn-success">Logout</a>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<!-- moderator logout Modal -->

<!-- Upload profile picture Modal -->
<div class="modal fade" id="change_profile_picture" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="../assets/script/php_script/moderator_upload_profile_picture.php" method="post" enctype="multipart/form-data"> <!-- Add form element -->
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Upload Picture</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupFile01">Upload</label>
                        <input type="file" class="form-control" id="inputGroupFile01" name="profile_picture"> <!-- Add name attribute -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" name="upload_profile_picture">Save changes</button> <!-- Change type to submit -->
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form> <!-- Close form element -->
        </div>
    </div>
</div>
<!-- Upload profile picture Modal -->

<!-- See profile Modal -->
<div class="modal fade" id="see_profile_picture" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <?php
                    $user = $_SESSION['username'];
                    $sql = "SELECT user_picture FROM moderator WHERE user_username = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("s", $user);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if($result->num_rows === 0) {
                        ?>
                        <img src="../render/uploads/images/profile_picture.jpg" alt="">

                        <?php
                    } else {
                        $row = $result->fetch_assoc();
                        $user_picture = $row['user_picture'];
                        ?>
                            <img class="profile_picture" src="../moderator_account/moderator_profile_picture/<?php echo $user_picture; ?>" alt="">
                        <?php
                    }
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- See profile Modal -->

<!-- Remove profile picture Modal -->
<div class="modal fade" id="remove_profile_picture" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm Remove Profile Picture</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <?php
                $user = $_SESSION['username'];
                $sql = "SELECT user_picture FROM moderator WHERE user_username = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $user);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows === 0) {
                    ?>
                    <img class="" src="../render/uploads/images/profile_picture.jpg" alt="">
                    <?php
                } else {
                    $row = $result->fetch_assoc();
                    $user_picture = $row['user_picture'];
                    ?>
                    <img class="profile_picture" src="../moderator_account/moderator_profile_picture/<?php echo $user_picture; ?>" alt="">
                    <?php
                }
                ?>
            </div>
            <div class="modal-footer">
                <form action="../assets/script/php_script/remove_profile_picture.php" method="post"> <!-- Add form for submission -->
                    <button type="submit" class="btn btn-danger" name="remove_profile_picture">Remove</button> <!-- Change to submit button -->
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Remove profile picture Modal -->

<!-- Change password Modal -->
<div class="modal fade" id="change_password" tabindex="-1" aria-labelledby="change_password_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="change_password_modal">Change Password</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../assets/script/php_script/update_new_password.php" method="post" id="change_password_form">
                    <div class="mb-3">
                        <label for="old_password" class="form-label">Old Password</label>
                        <input type="password" class="form-control" id="old_password" name="old_password" onkeyup="checkOldPassword()" required>
                        <div id="old_password_feedback"></div>
                    </div>
                    <div class="mb-3">
                        <label for="new_password" class="form-label">New Password</label>
                        <input type="password" class="form-control" id="new_password" name="new_password" onkeyup="checkConfirmPassword()" required disabled="true">
                        <div id="password_strength"></div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" onkeyup="checkConfirmPassword()" required disabled="true">
                        <div id="confirm_password_feedback"></div>
                    </div>

                    <hr>
                    <button type="submit" class="btn btn-success" id="update_password_button" disabled="true">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </form>
            </div>
            <div class="modal-footer">
                
            </div>
        </div>
    </div>
</div>
<!-- Change password Modal -->

<!-- update profile Modal -->
<div class="modal fade" id="update_profile" tabindex="-1" aria-labelledby="update_profile_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="update_profile_modal">Update Profile Information</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../assets/script/php_script/update_profile_info.php" method="post">
                    <?php
                    if (isset($_SESSION['username'])) {
                        $username = $_SESSION['username'];

                        // Assuming your database connection is stored in $conn
                        $query = "SELECT * FROM moderator WHERE user_username = ?";
                        $stmt = $conn->prepare($query);
                        $stmt->bind_param("s", $username);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        // Fetch data and do something with it
                        while ($row = $result->fetch_assoc()) {
                        ?>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="username" value="<?php echo $row['user_username']?>" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" value="<?php echo $row['user_givenName']?>" autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="<?php echo $row['user_familyName']?>" autocomplete="off">
                        </div>
                        <div class="row">
                            <div class="col-2 mb-3">
                                <label for="middle_initial" class="form-label">(M.I.)</label>
                                <input type="text" class="form-control" id="middle_initial" name="middle_initial" placeholder="" value="<?php echo $row['user_middleI']?>" maxlength="1" autocomplete="off">
                            </div>
                            <div class="col-4 mb-3">
                                <label for="birthday" class="form-label">Birthday</label>
                                <input type="date" class="form-control" id="birthday" name="birthday" value="<?php echo $row['user_birthday']?>" autocomplete="off">
                            </div>
                            <div id="profile_gender" class="col mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <select class="form-select" id="gender" name="gender">
                                    <option value="default" disabled selected>Select Gender</option>
                                    <?php
                                        $gender = $row['user_gender']; // Assuming this is the column in your database that holds the gender value
                                    ?>
                                    <option value="Male" <?php if($gender == "Male") echo "selected"; ?>>Male</option>
                                    <option value="Female" <?php if($gender == "Female") echo "selected"; ?>>Female</option>
                                    <option value="Other" <?php if($gender == "Other") echo "selected"; ?>>Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="prfile_email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="profile_email" name="profile_email" placeholder="name@example.com" value="<?php echo $row['user_email']?>" autocomplete="off">
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label for="profile_faculty_number" class="form-label">Faculty No.</label>
                                <input type="text" class="form-control" id="profile_faculty_number" name="profile_faculty_number" placeholder="#######" value="<?php echo $row['user_faculty_number']?>" autocomplete="off">
                            </div>
                            <div class="col mb-3">
                                <label for="profile_member_type" class="form-label">Member Type</label>
                                <input type="text" class="form-control" id="profile_member_type" name="profile_member_type" placeholder="" value="<?php echo $row['user_member_type']?>" autocomplete="off">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="profile_bio" class="form-label">Bio</label>
                            <textarea class="form-control" id="profile_bio" rows="3" name="profile_bio" autocomplete="off"><?php echo $row['user_bio']?></textarea>
                        </div>
                        <?php
                        }
                    }
                    ?>
                    <hr>
                    <button type="submit" class="btn btn-success">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- update profile Modal -->

<!-- add new event Modal -->
<div class="modal fade" id="add_new_event" tabindex="-1" aria-labelledby="add_new_event_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="add_new_event_modal">Add New Event</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="p-2" action="../assets/script/php_script/add_new_event_script.php" method="post">
                    <div class="form-group mb-2">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" required>
                    </div>

                    <div class="row mb-2">
                        <div class="form-group col-lg-6">
                            <label for="timeFrom">Time From:</label>
                            <input type="time" class="form-control" id="timeFrom" name="timeFrom" required>
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="timeTo">Time To:</label>
                            <input type="time" class="form-control" id="timeTo" name="timeTo" required>
                        </div>
                    </div>

                    <div class="form-group mb-2">
                        <label for="date">Date:</label>
                        <input type="date" class="form-control" id="date" name="date" required>
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
<!-- add new event Modal -->

<!-- edit fines Modal -->
<div class="modal fade" id="edit_fines" tabindex="-1" aria-labelledby="edit_fines_modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="edit_fines_modal">Update Fine</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="../assets/script/php_script/update_fines.php">
                    <div class="form-group mb-3">
                        <label for="userType">User Type:</label>
                        <select class="form-select" id="userType" name="userType" required>
                            <option value="" disabled selected>Select User Type</option>
                            <option value="student">Student</option>
                            <option value="faculty">Faculty</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="bookType">Book Type:</label>
                        <select class="form-select" id="bookType" name="bookType" required>
                            <option value="" disabled selected>Select Book Type</option>
                            <option value="general circulation">General Circulation</option>
                            <option value="reserve">Reserve</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="fine">Fine Amount:</label>
                        <input type="number" class="form-control" id="fine" name="fine" placeholder="Enter fine amount" min="0" step="0.01" required>
                    </div>
                    <div class="text-end">
                        <hr>
                        <button type="submit" name="update" class="btn btn-success">Update</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- edit fines Modal -->

<!-- update vision Modal -->
<div class="modal fade" id="edit_vision" tabindex="-1" aria-labelledby="edit_vision_modal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="edit_vision_modal">Update Vision</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../assets/script/php_script/update_vision.php" method="post">
            <div class="form-group mb-3">
                <?php
                    $sql = "SELECT subText FROM librarypages WHERE mainText = 'vision'";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)) {
                ?>
                <label for="update_vision">Vision</label>
                <textarea class="form-control" name="update_vision" id="update_vision" rows='15'><?php echo $row['subText'];?></textarea>
                <?php
                    }
                ?>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-success" name="submit">Save changes</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- update vision Modal -->

<!-- update mission Modal -->
<div class="modal fade" id="edit_mission" tabindex="-1" aria-labelledby="edit_mission_modal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="edit_mission_modal">Update Mision</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../assets/script/php_script/update_mission.php" method="post">
            <div class="form-group mb-3">
                <?php
                    $sql = "SELECT subText FROM librarypages WHERE mainText = 'mission'";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)) {
                ?>
                <label for="update_mission">Mission</label>
                <textarea class="form-control" name="update_mission" id="update_mission" rows='15'><?php echo $row['subText'];?></textarea>
                <?php
                    }
                ?>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-success" name="submit">Save changes</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- update mission Modal -->

<!-- add new objective Modal -->
<div class="modal fade" id="library_objectives" tabindex="-1" aria-labelledby="library_objectives_modal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="library_objectives_modal">Add new Objective</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../assets/script/php_script/add_new_objective.php" method="post">
            <div class="form-group mb-3">
                <label for="add_objective">Objective</label>
                <textarea type="text" name="add_objective" id="add_objective" class="form-control" rows="10" required></textarea>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Add</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- add new objective Modal -->

<!-- add new rules Modal -->
<div class="modal fade" id="library_rules" tabindex="-1" aria-labelledby="library_rules_modal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="library_rules_modal">Add new Rules and Regulations</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../assets/script/php_script/add_new_rules.php" method="post">
            <div class="form-group mb-3">
                <label for="add_rules">Objective</label>
                <textarea type="text" name="add_rules" id="add_rules" class="form-control" rows="10" required></textarea>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Add</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- add new rules Modal -->

<!-- Edit Objective Modal -->
<div class="modal fade" id="editObjectiveModal" tabindex="-1" aria-labelledby="editObjectiveModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Objective</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body mb-3">
                <form action="../assets/script/php_script/edit_objective.php" method="post">
                    <input type="hidden" name="id" id="editModalId"> <!-- Hidden input to store the record ID -->
                    <div class="modal-body">
                        <textarea id="subTextTextarea" name="subText" class="form-control"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Edit Objective Modal -->

<!-- Delete Objective Modal -->
<div class="modal fade" id="deleteObjectiveModal" tabindex="-1" aria-labelledby="deleteObjectiveModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Objective</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this objective?</p>
                <p>Objective Content:</p>
                <div id="objectiveContent"></div>
            </div>
            <div class="modal-footer">
                <form action="../assets/script/php_script/delete_objective.php" method="post">
                    <input type="hidden" name="id" id="deleteModalId">
                    <button type="submit" class="btn btn-danger">Delete</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Delete Objective Modal -->

<!-- Edit rules Modal -->
<div class="modal fade" id="editRulesModal" tabindex="-1" aria-labelledby="editRulesModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editRulesModalLabel">Update Rules and Regulations</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body mb-3">
                <form action="../assets/script/php_script/edit_rules.php" method="post">
                    <input type="hidden" name="id" id="editModalId"> <!-- Hidden input to store the record ID -->
                    <div class="modal-body">
                        <textarea id="subTextTextarea" name="subText" class="form-control"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Edit rules Modal -->

<!-- Delete rules Modal -->
<div class="modal fade" id="deleteRulesModal" tabindex="-1" aria-labelledby="deleteRulesModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteRulesModalLabel">Delete Objective</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this objective?</p>
                <p>Rules and Regulations Content:</p>
                <div id="rulesContent"></div>
            </div>
            <div class="modal-footer">
                <form action="../assets/script/php_script/delete_rules.php" method="post">
                    <input type="hidden" name="id" id="deleteModalId">
                    <button type="submit" class="btn btn-danger">Delete</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Delete rules Modal -->

<!-- add links Modal -->
<div class="modal fade" id="links_modal" tabindex="-1" aria-labelledby="links_modal_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="links_modal_label">Add Link</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../assets/script/php_script/add_links.php" method="post">
                    <div class="mb-3">
                        <label for="linkType" class="form-label">Link Type</label>
                        <select class="form-select" id="linkType" name="linkType" onchange="checkOption()">
                            <option value="default" disabled selected>Select Option</option>
                            <option value="academic subscription">Academic Subscription</option>
                            <option value="e-books">E-books</option>
                            <option value="e-journals">E-journals</option>
                            <option value="cvsu tanza page">CvSU Tanza Pages</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="linkURL" class="form-label">Link URL</label>
                        <input type="text" class="form-control" id="linkURL" name="linkURL" required>

                    </div>
                    <div class="mb-3">
                        <label for="linkDescription" class="form-label">Link Title</label>
                        <input type="text" class="form-control" id="linkDescription" name="linkTitle" required>
                    </div>
                    <div class="text-end">
                        <button id="submitButton" type="submit" class="btn btn-success" name="submitButton">Submit</button>
                    </div>
                    <p id="errorMessage" style="color: red;"></p>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- add links Modal -->

<!-- Create announcemnet Modal -->
<div class="modal fade" id="create_announcement_modal" tabindex="-1" aria-labelledby="create_announcement_modal_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="create_announcement_modal_label">Create Announcement</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-3 border-bottom p-2">
                    <img src="../assets/image/cvsu_library.png" alt="" srcset="" style="width: 50%;">
                </div>
                <h2 class="text-center">Upload Form</h2>
                <form action="../assets/script/php_script/create_announcement.php" method="post" enctype="multipart/form-data">
                    <!-- Textbox -->
                    <input class="form-control" type="text" name="text" id="text" placeholder="Title/Caption" autocomplete="off" required>

                    <br>

                    <!-- Image Upload -->
                    <div class="input-group">
                        <input class="form-control" type="file" name="images[]" id="images" accept="image/*" multiple>
                        <label class="input-group-text" for="images">Images</label>
                    </div>
                    <br>

                    <!-- Video Upload -->
                    <div class="input-group">
                        <input class="form-control" type="file" name="videos[]" id="videos" accept="video/*" multiple>
                        <label class="input-group-text" for="videos">Videos</label>
                    </div>

                    <br>

                    <!-- Iframe -->
                    <label class="form-label" for="iframe">Embed Post</label>
                    <textarea class="form-control" name="iframe" id="iframe" rows="4" cols="50" style="resize: none;" placeholder="Paste URL here"></textarea>

                    <br><br>

                    <!-- Submit Button -->
                    <input class="btn btn-success" type="submit" value="Post" style="width: 100%;">
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Create announcemnet Modal -->

<!-- Acquisition Modal -->
<div class="modal fade" id="acquisition_modal" tabindex="-1" aria-labelledby="acquisition_modal_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="acquisition_modal_label">Add new acquisition</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="acquisition_form" action="../assets/script/php_script/add_acquisition.php" method="post">
                    <div class="mb-3">
                        <label for="author_input" class="form-label">Author</label>
                        <input type="text" class="form-control" id="author_input" name="author" required>
                    </div>
                    <div class="mb-3">
                        <label for="year_publish_input" class="form-label">Year Published</label>
                        <input type="number" class="form-control" id="year_publish_input" name="year_publish" required>
                    </div>
                    <div class="mb-3">
                        <label for="year_acquired_input" class="form-label">Year Acquired</label>
                        <input type="number" class="form-control" id="year_acquired_input" name="year_acquired" required>
                    </div>
                    <div class="mb-3">
                        <label for="title_input" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title_input" name="title" required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Acquisition Modal -->