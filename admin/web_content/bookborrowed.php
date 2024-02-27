<h1 id="pageHeader">Book Borrowed</h1>
<div class="p-5">
    <?php
        // Fetch data from the bookBorrowed table
        $sqlBorrowed = "SELECT * FROM bookborrowed";
        $resultBorrowed = $conn->query($sqlBorrowed);

        if ($resultBorrowed->num_rows > 0) {
            // Output a table header
            ?>
            <table id="bookBorrowedTable" class="table table-sm nowrap table-striped compact table-hover" style="width:100%">
                <thead class="table-success">
                    <tr>
                        <th>Action</th>
                        <th>Library Id</th>
                        <th>Name</th>
                        <th>Book Access No.</th>
                        <th>Book Title</th>
                        <th>Book Call No.</th>
                        <th>Pickup Date</th>
                        <th>Due Date</th>
                        <th>Fine</th>
                        <th>Course & Section</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Output data of each row
                    while ($rowBorrowed = $resultBorrowed->fetch_assoc()) {
                        $id = $rowBorrowed["id"];
                        date_default_timezone_set('Asia/Manila');

                        // Get the current date
                        $currentDate = date('Y-m-d');
                        ?>
                        <tr>
                            <td>
                                <button id="book_return" class="btn btn-success btn-sm book_return"
                                        data-id="<?php echo $rowBorrowed["id"]; ?>"
                                        data-libraryid="<?php echo $rowBorrowed["libraryid"]; ?>"
                                        data-name="<?php echo $rowBorrowed["name"]; ?>"
                                        data-course="<?php echo $rowBorrowed["courseSection"]; ?>"
                                        data-email="<?php echo $rowBorrowed["email"]; ?>"
                                        data-accessno="<?php echo $rowBorrowed["bookAccessNo"]; ?>"
                                        data-title="<?php echo $rowBorrowed["bookTitle"]; ?>"
                                        data-callno="<?php echo $rowBorrowed["bookCallNo"]; ?>"
                                        data-pickup="<?php echo $rowBorrowed["pickupDate"]; ?>"
                                        data-due="<?php echo $rowBorrowed["returnDate"]; ?>"
                                        data-return="<?php echo $currentDate; ?>"
                                        data-fine="<?php echo $rowBorrowed["fine"]; ?>">Returned
                                </button> 
                                <button id="book_missing" class="btn btn-warning btn-sm book_missing"
                                        data-id="<?php echo $rowBorrowed["id"]; ?>"
                                        data-libraryid="<?php echo $rowBorrowed["libraryid"]; ?>"
                                        data-name="<?php echo $rowBorrowed["name"]; ?>"
                                        data-course="<?php echo $rowBorrowed["courseSection"]; ?>"
                                        data-email="<?php echo $rowBorrowed["email"]; ?>"
                                        data-accessno="<?php echo $rowBorrowed["bookAccessNo"]; ?>"
                                        data-title="<?php echo $rowBorrowed["bookTitle"]; ?>"
                                        data-callno="<?php echo $rowBorrowed["bookCallNo"]; ?>"
                                        data-pickup="<?php echo $rowBorrowed["pickupDate"]; ?>"
                                        data-due="<?php echo $rowBorrowed["returnDate"]; ?>"
                                        data-return="<?php echo $currentDate; ?>"
                                        data-fine="<?php echo $rowBorrowed["fine"]; ?>">Missing
                                </button> 
                                <button id="book_damage" class="btn btn-danger btn-sm book_damage"
                                        data-id="<?php echo $rowBorrowed["id"]; ?>"
                                        data-libraryid="<?php echo $rowBorrowed["libraryid"]; ?>"
                                        data-name="<?php echo $rowBorrowed["name"]; ?>"
                                        data-course="<?php echo $rowBorrowed["courseSection"]; ?>"
                                        data-email="<?php echo $rowBorrowed["email"]; ?>"
                                        data-accessno="<?php echo $rowBorrowed["bookAccessNo"]; ?>"
                                        data-title="<?php echo $rowBorrowed["bookTitle"]; ?>"
                                        data-callNo="<?php echo $rowBorrowed["bookCallNo"]; ?>"
                                        data-pickup="<?php echo $rowBorrowed["pickupDate"]; ?>"
                                        data-due="<?php echo $rowBorrowed["returnDate"]; ?>"
                                        data-return="<?php echo $currentDate; ?>"
                                        data-fine="<?php echo $rowBorrowed["fine"]; ?>">Damaged
                                </button> 
                            </td>
                            <td><?php echo $rowBorrowed["libraryid"]; ?></td>
                            <td><?php echo $rowBorrowed["name"]; ?></td>
                            <td><?php echo $rowBorrowed["bookAccessNo"]; ?></td>
                            <td><?php echo $rowBorrowed["bookTitle"]; ?></td>
                            <td><?php echo $rowBorrowed["bookCallNo"]; ?></td>
                            <td><?php echo $rowBorrowed["pickupDate"]; ?></td>
                            <td><?php echo $rowBorrowed["returnDate"]; ?></td>
                            <td id="bookPenalty">
                                <?php
                                    // Get the current date and time
                                    $currentDate = date("Y-m-d H:i:s");

                                    // Convert returnDate to a DateTime object
                                    $returnDate = new DateTime($rowBorrowed["returnDate"]);

                                    // Convert currentDate to a DateTime object
                                    $currentDateTime = new DateTime($currentDate);

                                    // Calculate the difference between returnDate and currentDate
                                    $dateDiff = $returnDate->diff($currentDateTime);

                                    // Get the total difference in days
                                    $daysDifference = $dateDiff->format("%r%a"); // %r includes the sign (- or +)

                                    // Display the difference in days
                                    echo abs($daysDifference) . " day(s) "; // Use abs() to get the absolute value

                                    // Check if the return date is in the past
                                    if ($dateDiff->invert) {
                                        // If negative, display "days left"
                                        echo "left";
                                    } else {
                                        $student_general_circulation_fine = "SELECT links FROM librarypages WHERE mainText = 'student' AND subText = 'general circulation'";
                                        $resultSgcFine = $conn->query($student_general_circulation_fine);

                                        if ($resultSgcFine->num_rows > 0) {
                                            $rowSgcFine = $resultSgcFine->fetch_assoc();
                                            $penaltyRate = (int)$rowSgcFine['links'];

                                            // Calculate fine based on penalty rate and days difference
                                            $fine = (int)$daysDifference * $penaltyRate;

                                            // Display the calculated fine
                                            echo ('₱'), $fine;
                                        }

                                        // Update the penalty in the database
                                        $updateQuery = "UPDATE bookborrowed SET fine = ? WHERE id = ?";
                                        $stmt = $conn->prepare($updateQuery);
                                        $stmt->bind_param("ii", $fine, $id);
                                        $stmt->execute();
                                    }

                                    
                                ?>
                                
                            </td>
                            <td><?php echo $rowBorrowed["courseSection"]; ?></td>
                            <td><?php echo $rowBorrowed["email"]; ?></td>
                            
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
            <?php
        } else {
            echo "0 results";
        }

    ?>
</div>