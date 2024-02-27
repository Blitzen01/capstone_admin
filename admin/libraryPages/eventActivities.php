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
        <title>Calendar of Events</title>

        <link rel="stylesheet" href="../assets/style/style.css">
    </head>

    <body>
        <?php include '../adminNavigation/header.php' ?>

        <div id="admin-body" class="pt-2">
            <div class="row pt-5">
                <div class="col-lg-3">
                    <?php include '../adminNavigation/sidebar.php'; ?>
                </div>
                <div class="col-lg-9">
                    <section>
                        <h1 id="pageHeader">Calendar of Events</h1>
                        <div class="container-fluid text-center p-5">
                            <div class="row">
                                <div class="col-lg-5 text-start">
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add_new_event">
                                        Add Event
                                    </button>
                                    
                                    <?php
                                        // Get the current year and month
                                        $currentYear = date("Y");
                                        $currentMonth = date("m");

                                        // Get the first day of the current month
                                        $firstDayOfMonth = date("Y-m-01", strtotime($currentYear . "-" . $currentMonth . "-01"));

                                        // Get the last day of the current month
                                        $lastDayOfMonth = date("Y-m-t", strtotime($currentYear . "-" . $currentMonth . "-01"));

                                        // SQL query to retrieve all events for the current month
                                        $sql = "SELECT event_date, event_timeFrom, event_timeTo, event_title FROM events WHERE event_date BETWEEN '$firstDayOfMonth' AND '$lastDayOfMonth'";

                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            // Events exist for the current month
                                            while($row = $result->fetch_assoc()) {
                                                // Convert time format from 24-hour to 12-hour format
                                                $timeFrom = date("h:i A", strtotime($row["event_timeFrom"]));
                                                $timeTo = date("h:i A", strtotime($row["event_timeTo"]));

                                                // Format the event date to "Month Day, Year" format
                                                $formattedEventDate = date("F j, Y", strtotime($row["event_date"]));

                                                ?>
                                                <div class='card shadow mt-2 p-2'>
                                                    <p><?php echo $formattedEventDate; ?> <span class="fs-small"> <br> <?php echo $timeFrom . " - " . $timeTo; ?></span></p>
                                                    <h4 class="text-center border-top  p-1"><?php echo $row['event_title']; ?></h4>
                                                </div>
                                                <?php
                                            }
                                        } else {
                                            echo "<div class='card mt-2 p-2'>There are no events this month.</div>";
                                        }
                                    ?>
                                </div>
                                <div class="col-lg-7">
                                    <?php include '../render/calendar/calendar.php'; ?>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>

        <script src="../assets/script/script.js"></script>
    </body>
</html>