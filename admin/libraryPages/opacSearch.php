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
        <title>OPAC Search</title>

        <link rel="stylesheet" href="../assets/style/style.css">

        <style>
            /* Hide the arrow buttons in number input */
            input[type=number]::-webkit-inner-spin-button,
            input[type=number]::-webkit-outer-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }
            input[type=number] {
                -moz-appearance: textfield; /* Firefox */
            }
        </style>
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
                        <h1 id="pageHeader">OPAC Search</h1>
                        <div class="container">
                            <!-- opac background -->
                            <div class="row mb-5 text-center border-bottom pb-5">
                                <div class="col">
                                    <?php
                                        $sql = "SELECT subText FROM librarypages WHERE pages = 'opacSearch' AND mainText = 'background'";
                                        $result = $conn->query($sql);
                                        
                                        if ($result->num_rows > 0) {
                                            $row = $result->fetch_assoc();
                                            $imageName = $row["subText"];

                                            echo ' <img id="opacBG" src="../render/uploads/images/' . $imageName . '" alt="Image">';
                                            ?>
                                                <div class="text-start">
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="nav-link text-primary ps-3 pt-2" data-bs-toggle="modal" data-bs-target="#opac_bg_modal">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </button>
                                                </div>
                                            <?php
                                        } else {
                                            echo "No image found in the database.";
                                        }
                                    ?>
                                </div>
                            </div>

                            <div class="col">
                                <div class="row text-center">
                                    <div class="px-3">
                                        <h2>LIBRARY TRANSACTIONS</h2>
                                    </div>
                                    <div class="col-lg-6 col-sm-12 mb-5">
                                        <!-- library hours -->
                                        <div class="m-1 card shadow">
                                            <h4>Library Hours</h4>
                                            <button type="button" class="nav-link text-primary " data-bs-toggle="modal" data-bs-target="#library_hours_modal">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                            <?php
                                                // Fetch data from the database
                                                $libraryDayQuery = "SELECT mainText, subText FROM librarypages WHERE links = 'libraryHours'";
                                                $resultDay = $conn->query($libraryDayQuery);

                                                // Check if the query was successful
                                                if ($resultDay === false) {
                                                    echo "Error: " . $conn->error;
                                                } else {
                                                    // Check if there are rows in the result set
                                                    if ($resultDay->num_rows > 0) {
                                                        // Loop through the rows and display the data
                                                        while ($row = $resultDay->fetch_assoc()) {
                                                            echo "<span><h6>" . $row['mainText'] . "</h6></span>";

                                                            // Check if subText exists in the row
                                                            if (isset($row['subText'])) {
                                                                // Split the range into start and end times
                                                                list($startTime, $endTime) = explode(" - ", $row['subText']);

                                                                // Convert start time to 12-hour format with AM/PM
                                                                $formattedStartTime = date("h:i A", strtotime($startTime));

                                                                // Convert end time to 12-hour format with AM/PM
                                                                $formattedEndTime = date("h:i A", strtotime($endTime));

                                                                // Display the formatted range
                                                                echo "<span>" . $formattedStartTime . " - " . $formattedEndTime . "</span>";
                                                            } else {
                                                                echo "<span>No subText data found</span>";
                                                            }
                                                        }
                                                    } else {
                                                        echo "No data found";
                                                    }
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-12 mb-5 text-center">
                                        <!-- overdue fines -->
                                        <div class="m-1 card shadow">
                                            <h4>Overdue Fines</h4>
                                            <button type="button" class="btn text-primary" data-bs-toggle="modal" data-bs-target="#edit_fines">
                                                <i class='fa-solid fa-pen-to-square'></i>
                                            </button>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>CLIENT</th>
                                                        <th>BOOK TYPE</th>
                                                        <th>FINES</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-start">
                                                    <tr>
                                                        <td>
                                                            Student
                                                        </td>
                                                        <td>
                                                            <div class="border-bottom pb-2">General Circulation</div>
                                                            <div>Reserve</div>
                                                        </td>
                                                        <td>
                                                            <div class="border-bottom">
                                                                <?php
                                                                    $sgc = "SELECT links FROM librarypages WHERE mainText = 'student' AND subText = 'general circulation'";
                                                                    $result = $conn->query($sgc);
                                                                    
                                                                    if ($result->num_rows > 0) {
                                                                        // Fetch the data and store it in the $librarypages variable
                                                                        $row = $result->fetch_assoc();
                                                                        $librarypages = $row['links'];
                                                                        
                                                                        echo $librarypages . "/day*";
                                                                    } else {
                                                                        echo "No results found";
                                                                    }
                                                                ?>
                                                            </div>
                                                            <div>
                                                                <?php
                                                                    $sgc = "SELECT links FROM librarypages WHERE mainText = 'student' AND subText = 'reserve'";
                                                                    $result = $conn->query($sgc);
                                                                    
                                                                    if ($result->num_rows > 0) {
                                                                        // Fetch the data and store it in the $librarypages variable
                                                                        $row = $result->fetch_assoc();
                                                                        $librarypages = $row['links'];
                                                                    
                                                                        echo $librarypages . "/day*";
                                                                        
                                                                    } else {
                                                                        echo "No results found";
                                                                    }
                                                                ?>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Faculty
                                                        </td>
                                                        <td>
                                                            <div class="border-bottom pb-2">General Circulation</div>
                                                            <div>Reserve</div>
                                                        </td>
                                                        <td>
                                                            <div class="border-bottom">
                                                                <?php
                                                                        $sgc = "SELECT links FROM librarypages WHERE mainText = 'faculty' AND subText = 'general circulation'";
                                                                        $result = $conn->query($sgc);
                                                                        
                                                                        if ($result->num_rows > 0) {
                                                                            // Fetch the data and store it in the $librarypages variable
                                                                            $row = $result->fetch_assoc();
                                                                            $librarypages = $row['links'];
                                                                            
                                                                            echo $librarypages . "/day*";
                                                                        } else {
                                                                            echo "No results found";
                                                                        }
                                                                    ?>
                                                            </div>
                                                            <div>
                                                                <?php
                                                                        $sgc = "SELECT links FROM librarypages WHERE mainText = 'faculty' AND subText = 'reserve'";
                                                                        $result = $conn->query($sgc);
                                                                        
                                                                        if ($result->num_rows > 0) {
                                                                            // Fetch the data and store it in the $librarypages variable
                                                                            $row = $result->fetch_assoc();
                                                                            $librarypages = $row['links'];
                                                                            echo $librarypages . "/day*";
                                                                        } else {
                                                                            echo "No results found";
                                                                        }
                                                                    ?>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
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