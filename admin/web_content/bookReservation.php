<h1 id="pageHeader">Book Reservation</h1>
<div class="p-5">
    <?php
        // Fetch data from the bookReservation table
        $sql = "SELECT * FROM bookreserve";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output a table header
            ?>
                <table id="bookReserveTable" class="table table-sm nowrap table-striped compact table-hover" style="width:100%">
                <thead class="table-success">
                    <tr>
                        <th>Action</th>
                        <th>Status</th>
                        <th>Library Id</th>
                        <th>Name</th>
                        <th>Book Access No.</th>
                        <th>Book Title</th>
                        <th>Book Call No.</th>
                        <th>Pickup Date</th>
                        <th>Return Date</th>
                        <th>Course & Section</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        $pickupDate = $row["pickupDate"];
                        $currentDate = new DateTime();
                        $currentDateFormatted = $currentDate->format('Y-m-d');
                        
                        // Convert strings to DateTime objects
                        $pickupDateTime = new DateTime($pickupDate);
                        $currentDateTime = new DateTime($currentDateFormatted);
                        // Add 1 day to the pickup date
                        $pickupDateTime->add(new DateInterval('P1D'));

                        if ($pickupDateTime != $currentDateTime) {
                            ?>
                            <tr>
                                <td>
                                    <?php
                                        $status = $row['status'];
                                        if($status == 'hold') {
                                    ?>
                                            <button class="btn btn-success btn-sm prepare_request"
                                                data-id="<?php echo $row["id"]; ?>"
                                                data-libraryid="<?php echo $row["libraryid"]; ?>"
                                                data-name="<?php echo $row["name"]; ?>"
                                                data-course="<?php echo $row["courseSection"]; ?>"
                                                data-email="<?php echo $row["email"]; ?>"
                                                data-accessno="<?php echo $row["bookAccessNo"]; ?>"
                                                data-title="<?php echo $row["bookTitle"]; ?>"
                                                data-callno="<?php echo $row["bookCallNo"]; ?>"
                                                data-pickup="<?php echo $row["pickupDate"]; ?>"
                                                data-return="<?php echo $row["returnDate"]; ?>" data-bs-toggle="modal" data-bs-target="#prepare_reservation">Prepare
                                            </button>
                                    <?php
                                        } else if($status == 'preparing') {
                                    ?>
                                            <button class="btn btn-success btn-sm to_pickup_request"
                                                data-id="<?php echo $row["id"]; ?>"
                                                data-libraryid="<?php echo $row["libraryid"]; ?>"
                                                data-name="<?php echo $row["name"]; ?>"
                                                data-course="<?php echo $row["courseSection"]; ?>"
                                                data-email="<?php echo $row["email"]; ?>"
                                                data-accessno="<?php echo $row["bookAccessNo"]; ?>"
                                                data-title="<?php echo $row["bookTitle"]; ?>"
                                                data-callno="<?php echo $row["bookCallNo"]; ?>"
                                                data-pickup="<?php echo $row["pickupDate"]; ?>"
                                                data-return="<?php echo $row["returnDate"]; ?>" data-bs-toggle="modal" data-bs-target="#to_pickup_reservation">To Pick Up
                                            </button>
                                    <?php
                                        } else if($status == 'to pickup') {
                                    ?>
                                            <button class="btn btn-success btn-sm accept_request"
                                                data-id="<?php echo $row["id"]; ?>"
                                                data-libraryid="<?php echo $row["libraryid"]; ?>"
                                                data-name="<?php echo $row["name"]; ?>"
                                                data-course="<?php echo $row["courseSection"]; ?>"
                                                data-email="<?php echo $row["email"]; ?>"
                                                data-accessno="<?php echo $row["bookAccessNo"]; ?>"
                                                data-title="<?php echo $row["bookTitle"]; ?>"
                                                data-callno="<?php echo $row["bookCallNo"]; ?>"
                                                data-pickup="<?php echo $row["pickupDate"]; ?>"
                                                data-return="<?php echo $row["returnDate"]; ?>" data-bs-toggle="modal" data-bs-target="#process_reservation">Picked Up
                                            </button>
                                    <?php
                                        }
                                    ?>
                                    <button class="btn btn-danger btn-sm decline_request"
                                            data-id="<?php echo $row["id"]; ?>"
                                            data-libraryid="<?php echo $row["libraryid"]; ?>"
                                            data-name="<?php echo $row["name"]; ?>"
                                            data-course="<?php echo $row["courseSection"]; ?>"
                                            data-email="<?php echo $row["email"]; ?>"
                                            data-accessno="<?php echo $row["bookAccessNo"]; ?>"
                                            data-title="<?php echo $row["bookTitle"]; ?>"
                                            data-callno="<?php echo $row["bookCallNo"]; ?>"
                                            data-pickup="<?php echo $row["pickupDate"]; ?>"
                                            data-return="<?php echo $row["returnDate"]; ?>" data-bs-toggle="modal" data-bs-target="#deny_reservation">Decline
                                    </button>
                                </td>
                                <td><?php echo $row["status"]; ?></td>
                                <td><?php echo $row["libraryid"]; ?></td>
                                <td><?php echo $row["name"]; ?></td>
                                <td><?php echo $row["bookAccessNo"]; ?></td>
                                <td><?php echo $row["bookTitle"]; ?></td>
                                <td><?php echo $row["bookCallNo"]; ?></td>
                                <td><?php echo $row['pickupDate']; ?></td>
                                <td><?php echo $row["returnDate"]; ?></td>
                                <td><?php echo $row["courseSection"]; ?></td>
                                <td><?php echo $row["email"]; ?></td>
                            </tr>
                            <?php
                        } else {
                            $id = $row['id'];
                            $libraryId = $row["libraryid"];
                            $name = $row["name"];
                            $courseSection = $row["courseSection"];
                            $email = $row["email"];
                            $bookAccessNo = $row["bookAccessNo"];
                            $bookTitle = $row["bookTitle"];
                            $bookCalln = $row["bookCallNo"];
                            $pickupDate = $row['pickupDate'];
                            $returnDate = $row['returnDate'];
                            $remarks = "Cancelled, Missing the designated time.";

                            $sql = "INSERT INTO booktransaction (id, libraryid, name, courseSection, email, bookAccessNo, bookTitle, bookCallNo, pickupDate, returnDate, remarks) VALUES ('$id', '$libraryId', '$name', '$courseSection', '$email', '$bookAccessNo', '$bookTitle', '$bookCalln', '$pickupDate', '$returnDate', '$remarks')";

                            if (mysqli_query($conn, $sql)) {
                                $sql1 = "DELETE FROM bookreserve WHERE id = '$id'";
                                if (mysqli_query($conn, $sql1)) {
                                    // include '../render/reload.php';
                                } else {
                                    echo "Error deleting record: " . mysqli_error($conn);
                                }
                            } else {
                                echo "Error inserting record: " . mysqli_error($conn);
                            }
                        }
                    ?>
                        
                        <?php
                    }
                    ?>
                </tbody>
            </table>
            <?php
        }
    ?>
    
</div>