<?php
// Include your database connection file
include '../../../render/connection.php';

// Check if user_id is set in the POST request
if(isset($_POST['userId'])) {
    // Sanitize the input to prevent SQL injection
    $userId = $conn->real_escape_string($_POST['userId']);

    // SQL query to fetch user details and book transactions based on user_id
    $sql = "SELECT u.*, bt.* FROM users u LEFT JOIN booktransaction bt ON u.user_id = bt.user_id WHERE u.user_id = '$userId'";
    $result = $conn->query($sql);

    // Check if the query was successful
    if ($result) {
        // Check if there is at least one row returned
        if ($result->num_rows > 0) {
            // Fetch all rows into an array
            $rows = $result->fetch_all(MYSQLI_ASSOC);

            // Fetch the user details from the first row
            $user_row = $rows[0];

            $user_picture = $user_row['user_picture'];
            $user_picture_without_prefix = str_replace("../", "", $user_picture);

            // Format the "Created" date and time
            $created_date = date("F d, Y", strtotime($user_row["user_created"])); // Format date as "January 22, 2001"
            $created_time = date("h:i A", strtotime($user_row["user_created"])); // Format time in 12-hour format

            // Check if $user_picture is not null and not an empty string
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
            <p><strong>User Id:</strong> <?php echo $user_row["user_id"]; ?></p>
            <p><strong>Full Name:</strong> <?php echo $user_row["user_fullname"]; ?></p>
            <p><strong>Username:</strong> <?php echo $user_row["user_username"]; ?></p>
            <p><strong>Email:</strong> <?php echo $user_row["user_email"]; ?></p>
            <p><strong>Member Type:</strong> <?php echo $user_row["user_member_type"]; ?></p>
            <p><strong>Faculty Department:</strong> <?php echo $user_row["user_faculty_department"]; ?></p>
            <p><strong>Faculty Number:</strong> <?php echo $user_row["user_faculty_number"]; ?></p>
            <p><strong>Created:</strong> <?php echo $created_date . " at " . $created_time; ?></p>
            <?php
            // Output book transaction details
            echo "<h3 class='pt-3'>Book Transactions</h3><hr>";
            foreach ($rows as $row) {
                if ($row["bookTitle"] !== null) {
                    echo "<p><strong>Book Title:</strong> " . $row["bookTitle"] . "</p>";
                    echo "<span><strong>Pickup Date:</strong> " . date("F d, Y", strtotime($row["pickupDate"])) . "</span><br>";
                    echo "<span><strong>Return Date:</strong> " . date("F d, Y", strtotime($row["returnDate"])) . "</span><br>";
                    echo "<span><strong>Remarks:</strong> " . $row["remarks"] . "</span>";
                    echo "<hr>";
                }
            }
        } else {
            echo "User not found or multiple users found with the same ID.";
        }
    } else {
        // Display an error message if the query fails
        echo "Error: " . $conn->error;
    }
} else {
    echo "User ID is not set.";
}
?>
