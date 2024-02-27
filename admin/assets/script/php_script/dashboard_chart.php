<!-- php script for bar graph -->
<?php
    $sql = "SELECT bookTitle, COUNT(*) as transactionCount 
    FROM booktransaction 
    GROUP BY bookTitle 
    ORDER BY transactionCount DESC 
    LIMIT 5";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Initialize empty arrays to store labels and data
    $labels = array();
    $data = array();

    // Check if the query was successful
    if ($result) {
        // Fetch all rows from the result set into an array
        while ($row = mysqli_fetch_assoc($result)) {
            // Add book title to labels array
            $labels[] = $row['bookTitle'];
            // Add transaction count to data array
            $data[] = $row['transactionCount'];
        }
    } else {
        // Display an error message if the query fails
        echo "Error: " . mysqli_error($conn);
    }
?>

<!-- php script for pie chart -->
<?php
    $sql1 = "SELECT courseSection, COUNT(*) as transactionCount 
    FROM booktransaction 
    GROUP BY courseSection 
    ORDER BY transactionCount DESC";

    // Execute the query
    $result1 = mysqli_query($conn, $sql1);

    // Initialize empty arrays to store labels and data
    $labels1 = array();
    $data1 = array();

    // Check if the query was successful
    if ($result1) {
    // Fetch all rows from the result set into an array
    while ($row1 = mysqli_fetch_assoc($result1)) {
        // Extract the text part of the courseSection
        $courseText = explode(' ', $row1['courseSection'])[0];
        
        // Add course section text to labels array
        $labels1[] = $courseText;
        // Add transaction count to data array
        $data1[] = $row1['transactionCount'];
    }
    }
?>