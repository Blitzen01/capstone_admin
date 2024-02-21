<h1 id="pageHeader">Book Transaction</h1>
<div class="p-5">
<!-- <a href="../render/export.php"> <button class="btn btn-success m-3" type="button" name="button">Export To Excel</button> </a> -->
    <?php
        // Fetch data from the bookBorrowed table
        $sqlBorrowed = "SELECT * FROM booktransaction";
        $resultBorrowed = $conn->query($sqlBorrowed);

        if ($resultBorrowed->num_rows > 0) {
            // Output a table header
            ?>
            <table id="bookTransactionTable" class="table table-sm nowrap table-striped compact table-hover" style="width:100%">
                <thead class="table-success">
                    <tr>
                        <th>Remarks</th>
                        <th>Library ID</th>
                        <th>Name</th>
                        <th>Book Access No.</th>
                        <th>Book Title</th>
                        <th>Book Call No.</th>
                        <th>Pickup Date</th>
                        <th>Due Date</th>
                        <th>Return Date</th>
                        <th>Fine</th>
                        <th>Course & Section</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Output data of each row
                    while ($rowBorrowed = $resultBorrowed->fetch_assoc()) {
                        $remarksClass = '';
                    
                        switch ($rowBorrowed["remarks"]) {
                            case 'Returned':
                                $remarksClass = 'text-success';
                                break;
                            case 'Missing':
                                $remarksClass = 'text-warning';
                                break;
                            default:
                                $remarksClass = 'text-danger';
                                break;
                        }
                    
                        ?>
                        <tr>
                            <td class="<?php echo $remarksClass; ?>"><?php echo $rowBorrowed["remarks"]; ?></td>
                            <td><?php echo $rowBorrowed["libraryid"]; ?></td>
                            <td><?php echo $rowBorrowed["name"]; ?></td>
                            <td><?php echo $rowBorrowed["bookAccessNo"]; ?></td>
                            <td><?php echo $rowBorrowed["bookTitle"]; ?></td>
                            <td><?php echo $rowBorrowed["bookCallNo"]; ?></td>
                            <td><?php echo $rowBorrowed["pickupDate"]; ?></td>
                            <td><?php echo $rowBorrowed["dueDate"]; ?></td>
                            <td><?php echo $rowBorrowed["returnDate"]; ?></td>
                            <td><?php echo ('₱'), empty($rowBorrowed["fine"]) ? 0 : $rowBorrowed["fine"]; ?></td>
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