<h1 id="pageHeader">Satisfaction Rating</h1>
<div class="card m-3 ps-3 pe-3 shadow">
    <h3 class="text-center">SUMMARY OF SATISFACTION RATINGS</h3>
    <table class="table table-sm nowrap table-striped compact table-hover text-center" style="width:100%">
        <thead>
            <tr>
                <th>Average Rating</th>
                <th>Descriptive Rating</th>
                <th>Year</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $select_sql = "SELECT YEAR(STR_TO_DATE(date, '%m/%d/%Y')) AS year, ROUND(AVG(rating), 2) AS average_rating 
                FROM ratings 
                GROUP BY YEAR(STR_TO_DATE(date, '%m/%d/%Y'));";
                $result = $conn->query($select_sql);

                if ($result) {
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $averageRating = $row['average_rating'];
                            $descriptiveRating = getDescriptiveRating($averageRating);
                            $year = $row['year'];
                            echo "<tr><td>$averageRating</td><td>$descriptiveRating</td><td>$year</td></tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>No ratings found</td></tr>";
                    }
                } else {
                    echo "Error: " . $conn->error;
                }

                function getDescriptiveRating($averageRating) {
                    if ($averageRating >= 4.5) {
                        return "HIGHLY SATISFIED";
                    } elseif ($averageRating >= 3.5) {
                        return "SATISFIED";
                    } elseif ($averageRating >= 2.5) {
                        return "NEUTRAL";
                    } elseif ($averageRating >= 1.5) {
                        return "DISSATISFIED";
                    } else {
                        return "HIGHLY DISSATISFIED";
                    }
                }
            ?>
        </tbody>
    </table>
</div>
<div class="m-5">
<table id="satisfactionRating" class="table table-sm nowrap table-striped compact table-hover" style="width:100%">
        <thead>
            <tr>
                <th>Category</th>
                <th>Subject</th>
                <th>Ratings</th>
                <th>Comments</th>
                <th>Date</th>
                <th>Time</th>
            </tr>
        </thead>

        <tbody>
                <?php
                    #select data
                    $select_sql = "SELECT * FROM ratings";
                    $select_sql1 = mysqli_query($conn, $select_sql);
                    if(mysqli_num_rows($select_sql1)) {
                        while($rows = mysqli_fetch_array($select_sql1)) {
                            ?>
                                <tr>
                                    <td><?php echo $rows['category']?></td>
                                    <td><?php echo $rows['subject']?></td>
                                    <td><?php echo $rows['rating']?></td>
                                    <td><?php echo $rows['comments']?></td>
                                    <td><?php echo $rows['date']?></td>
                                    <td><?php echo $rows['time']?></td>
                                </tr>
                            <?php
                        }
                    }
                ?>
        </tbody>

    </table>
</div>