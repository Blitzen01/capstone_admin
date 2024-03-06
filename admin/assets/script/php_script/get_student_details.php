<?php
// Include your database connection file
include '../../../render/connection.php';

// Check if user_id is set in the POST request
if(isset($_POST['userId'])) {
    // Sanitize the input to prevent SQL injection
    $userId = $conn->real_escape_string($_POST['userId']);

    // SQL query to fetch user details based on user_id
    $user_sql = "SELECT * FROM users WHERE user_id = '$userId'";
    $user_result = $conn->query($user_sql);

    // SQL query to fetch book transactions based on user_id
    $book_sql = "SELECT * FROM booktransaction WHERE user_id = '$userId'";
    $book_result = $conn->query($book_sql);

    // Check if the queries were successful
    if ($user_result && $book_result) {
        // Check if there is at least one row returned for user
        if ($user_result->num_rows > 0) {
            // Fetch the user details
            $user_row = $user_result->fetch_assoc();

            $user_picture = $user_row['user_picture'];
            $user_picture_without_prefix = str_replace("../", "", $user_picture);

            // Format the "Created" date and time
            $created_date = date("F d, Y", strtotime($user_row["user_created"])); // Format date as "January 22, 2001"
            $created_time = date("h:i A", strtotime($user_row["user_created"])); // Format time in 12-hour format

            // Output the user details in HTML format
            if ($user_picture !== null && $user_picture !== '') {
            ?>
                <div class="text-center">
                    <img class="border border-success border-3 rounded mb-3" src='../../user/<?php echo $user_picture_without_prefix; ?>' alt='' srcset='' style="width:7rem;">
                </div>
            <?php
            } else {
            ?>
                <div class="text-center">
                    <img class="border border-success border-3 rounded mb-3" src='../assets/image/uploaded_profile/blank_profile_picture.png' alt='' srcset='' style="width:7rem;">
                </div>
            <?php
            }
            ?>
                <p><strong>Full Name:</strong> <?php echo $user_row["user_fullname"]; ?></p>
                <p><strong>User Id:</strong> <?php echo $user_row["user_id"]; ?></p>
                <p><strong>Username:</strong> <?php echo $user_row["user_username"]; ?></p>
                <p><strong>Email:</strong> <?php echo $user_row["user_email"]; ?></p>
                <p><strong>Course:</strong> <?php echo $user_row["user_student_course"]; ?></p>
                <p><strong>Year:</strong> <?php echo $user_row["user_student_year"]; ?></p>
                <p><strong>Section:</strong> <?php echo $user_row["user_student_section"]; ?></p>
                <p><strong>Student Number:</strong> <?php echo $user_row["user_student_number"]; ?></p>
                <p><strong>Member Type:</strong> <?php echo $user_row["user_member_type"]; ?></p>
                <p><strong>Account Created:</strong> <?php echo $created_date . " at " . $created_time; ?></p>
            <?php

            // Check if there are any book transactions
            if ($book_result->num_rows > 0) {
                // Output book transaction details
                echo "<h3 class='pt-3'>Book Transactions</h3><hr>";
                while ($row = $book_result->fetch_assoc()) {
                    echo "<p><strong>Book Title:</strong> " . $row["bookTitle"] . "</p>";
                    echo "<span><strong>Pickup Date:</strong> " . date("F d, Y", strtotime($row["pickupDate"])) . "</span><br>";
                    echo "<span><strong>Return Date:</strong> " . date("F d, Y", strtotime($row["returnDate"])) . "</span><br>";
                    echo "<span><strong>Remarks:</strong> " . $row["remarks"] . "</span>";
                    echo "<hr>";
                }
            } else {
                echo "No book transactions found for this user.";
            }
        } else {
            echo "User not found.";
        }
    } else {
        // Display an error message if the queries fail
        echo "Error: " . $conn->error;
    }
} else {
    echo "User ID is not set.";
}
