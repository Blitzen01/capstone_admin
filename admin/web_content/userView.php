<div class="px-3">
    <h3>Library Visitors</h3>
    <table id="userView" class="table table-sm nowrap table-striped table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>Member Type</th>
                <th>Course/Department</th>
                <th>ID number</th>
                <th>Date</th>
                <th>Time in</th>
                <th>Time out</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql = "SELECT * FROM attendance_log";
                $result = $conn->query($sql);
                if($result){
                    if($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            ?>
                                <tr>
                                    <td><?php echo $row['fullname']; ?></td>
                                    <td><?php echo $row['member_type']; ?></td>
                                    <td><?php echo $row['course_department']; ?></td>
                                    <td><?php echo $row['id_number']; ?></td>
                                    <td><?php echo $row['date']; ?></td>
                                    <td><?php echo $row['time_in']; ?></td>
                                    <td><?php echo $row['time_out']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                </tr>
                            <?php
                        }
                    }
                }
            ?>
        </tbody>
    </table>
</div>