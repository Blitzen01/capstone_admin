<h1 id="pageHeader">Analytics</h1>
<div class="container-fluid text-center mb-3">
    <h2 class="border shadow p-2 mt-5 align-middle">MONTH OF <span id="currentMonth"></span></h2>

    <div class="row text-center">
        <div class="col-sm-10 col-lg-4"><br>
            <div class="m-sm-5 p-sm-5 m-lg-1 p-lg-2 card shadow">
                <div class="text-end pb-5 m-2">
                    <i class="fa-solid fa-hand-holding fs-5 border p-2 rounded-pill text-light bg-primary"></i>
                </div>
                <p>Total Borrow Request</p>
                <?php
                    $currentMonth = date('m');
                    $sql = "SELECT COUNT(*) as total_rows FROM booktransaction WHERE MONTH(returnDate) = $currentMonth";
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {
                        // Fetch the result as an associative array
                        $row = $result->fetch_assoc();
                        
                        // Access the total_rows field
                        $totalRows = $row["total_rows"];
                        
                        // Display the total number of rows
                        echo "<h1>" . $totalRows . "</h1>";
                    } else {
                        echo "No rows found";
                    }
                ?>
            </div>
        </div>
        <div class="col-sm-10 col-lg-4"><br>
            <div class="m-sm-5 p-sm-5 m-lg-1 p-lg-2 card shadow">
                <div class="text-end pb-5 m-2">
                    <i class="fa-solid fa-hand-holding-hand fs-5 border p-2 rounded-pill text-light bg-danger"></i>
                </div>
                <p>Total Borrowed Books</p>
                <?php
                    $currentMonth = date('m');

                    // Modify the SQL query to exclude rows with remarks containing 'Cancelled' or 'Declined'
                    $sql = "SELECT COUNT(*) as total_rows FROM booktransaction WHERE MONTH(returnDate) = $currentMonth AND remarks NOT LIKE '%Cancelled%' AND remarks NOT LIKE '%Declined%'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Fetch the result as an associative array
                        $row = $result->fetch_assoc();

                        // Access the total_rows field
                        $totalRows = $row["total_rows"];

                        // Display the total number of rows
                        echo "<h1>" . $totalRows . "</h1>";
                    } else {
                        echo "No rows found";
                    }
                ?>
            </div>
        </div>
        <div class="col-sm-10 col-lg-4"><br>
            <div class="m-sm-5 p-sm-5 m-lg-1 p-lg-2 card shadow">
                <div class="text-end pb-5 m-2">
                    <i class="fa-solid fa-hand-holding-dollar fs-5 border p-2 rounded-pill text-light bg-warning"></i>
                </div>
                <p>Total Fine Collected</p>
                <?php
                    $currentMonth = date('m');
                    $totalFine = 0;
                    // Construct the SQL query to fetch data for the current month
                    $sql = "SELECT * FROM booktransaction WHERE MONTH(returnDate) = $currentMonth";

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            // Check if 'fine' is a valid number
                            if (is_numeric($row['fine'])) {
                                // Cast 'fine' to an integer before adding to totalFine
                                $totalFine += (int)$row['fine'];
                            }
                        }
                    
                        // Display the total fine after processing all rows
                        echo "<h1>" . $totalFine . "</h1>";
                    } else {
                        echo "<h1>0</h1>";
                    }
                ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-10 col-lg-7 text-center"><br>
            <div id="report" class="m-sm-5 p-sm-5 m-lg-1 p-lg-5 card shadow">
                <h3>Today Reports</h3>
                <div class="row">
                    <!-- book request -->
                    <div class="col">
                        <p class="fs-small">Borrow<br>Request</p>
                        <?php
                            $currentDay = date('d');
                            $sql = "SELECT COUNT(*) as total_rows FROM bookreserve WHERE DAY(pickupDate) = $currentDay";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // Fetch the result as an associative array
                                $row = $result->fetch_assoc();

                                // Access the total_rows field
                                $totalRows = $row["total_rows"];

                                // Display the total number of rows
                                echo "<h2>" . $totalRows . "</h2>";
                            } else {
                                echo "No rows found";
                            }
                        ?>
                    </div>

                    <!-- book borrowed -->
                    <div class="col">
                        <p class="fs-small">Borrowed<br>Books</p>
                        <?php
                            $currentDay = date('d');
                            $sql = "SELECT COUNT(*) as total_rows FROM bookborrowed WHERE DAY(pickupDate) = $currentDay";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // Fetch the result as an associative array
                                $row = $result->fetch_assoc();

                                // Access the total_rows field
                                $totalRows = $row["total_rows"];

                                // Display the total number of rows
                                echo "<h2>" . $totalRows . "</h2>";
                            } else {
                                echo "No rows found";
                            }
                        ?>
                    </div>

                    <!-- fine collected -->
                    <div class="col">
                        <p class="fs-small">Fine<br>Collected</p>
                        <?php
                            // Initialize total fine
                            $totalFine = 0;

                            // Set the default timezone to Asia/Manila
                            date_default_timezone_set('Asia/Manila');
                            // Get the current date
                            $currentDate = date('Y-m-d');

                            // Construct the SQL query using prepared statements
                            $sql = "SELECT fine FROM booktransaction WHERE returnDate = ?";
                            $stmt = $conn->prepare($sql);

                            if ($stmt) {
                                // Bind parameters
                                $stmt->bind_param("s", $currentDate);
                                
                                // Execute query
                                $stmt->execute();
                                
                                // Bind result variables
                                $stmt->bind_result($fine);
                                
                                // Fetch results
                                while ($stmt->fetch()) {
                                    // Check if 'fine' is a valid number
                                    if (is_numeric($fine)) {
                                        // Cast 'fine' to an integer before adding to totalFine
                                        $totalFine += (int)$fine;
                                    }
                                }
                                
                                // Close statement
                                $stmt->close();
                                
                                // Display the total fine after processing all rows
                                echo "<h2>$totalFine</h2>";
                            } else {
                                // Display error if query preparation fails
                                echo "Error preparing statement: " . $conn->error;
                            }
                        ?>
                    </div>
                </div>
                
            </div>
            <div id="report" class="m-sm-5 p-sm-5 m-lg-1 p-lg-0"><br>
                <div class=" card shadow">
                    <h3>Most Borrowed Books</h3>
                    <div class="col-sm-10 col-lg-8 mx-auto">
                        <canvas id="barGraph"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col"><br>
            <div class="m-sm-5 p-sm-5 m-lg-1 p-lg-0">
                <div class="card shadow">
                    <h3>Top Library Users</h3>
                    <div id="pieChartBox"class="col-sm-10 col m-1">
                        <p>(By Courses)</p>
                    <canvas id="myChart"></canvas>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>