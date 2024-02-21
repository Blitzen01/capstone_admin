<h1 id="pageHeader">Collection</h1>
<div class="container-fluid text-center">
    <div class="row">
        <div class="col-sm-10 col-lg-4"> <br>
            <div class="m-sm-5 p-sm-5 m-lg-1 p-lg-1 card shadow">
                <div class="text-end pb-5 m-2">
                    <i class="fa-solid fa-book fs-5 p-2 rounded-circle bg-primary text-light"></i>
                </div>
                <p>Total Print Books</p>
                <?php
                    $sql = "SELECT SUM(book_totalCopy) AS total_books FROM books";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $totalBooks = $row['total_books'];
                        echo "<h1>$totalBooks</h1>";
                    } else {
                        echo "<h1>0</h1>";
                    }
                ?>

            </div>
        </div>
        <div class="col-sm-10 col-lg-4"> <br>
            <div class="m-sm-5 p-sm-5 m-lg-1 p-lg-1 card shadow">
                <div class="text-end pb-5 m-2">
                    <i class="fa-solid fa-newspaper fs-5 p-2 rounded-circle bg-warning text-light"></i>
                </div>
                <p>Total Academic Subscription</p>
                <?php
                    $sql = "SELECT COUNT(*) AS total_academic_subscription FROM librarypages WHERE mainText = 'academic subscription'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $totalAcademicSubscription = $row['total_academic_subscription'];
                        echo "<h1>$totalAcademicSubscription</h1>";
                    } else {
                        echo "<h1>0</h1>";
                    }
                ?>

            </div>
        </div>
        <div class="col-sm-10 col-lg-4"> <br>
            <div class="m-sm-5 p-sm-5 m-lg-1 p-lg-1 card shadow">
                <div class="text-end pb-5 m-2">
                    <i class="fa-solid fa-book-atlas fs-5 p-2 rounded-circle bg-danger text-light"></i>
                </div>
                <p>Total E-Books</p>
                <?php
                    $sql = "SELECT COUNT(*) AS total_e_books FROM librarypages WHERE mainText = 'e-books'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $totalEBooks = $row['total_e_books'];
                        echo "<h1>$totalEBooks</h1>";
                    } else {
                        echo "<h1>0</h1>";
                    }
                ?>
            </div>
        </div>
        <div class="col-sm-10 col-lg-4"> <br>
            <div class="m-sm-5 p-sm-5 m-lg-1 p-lg-1 card shadow">
                <div class="text-end pb-5 m-2">
                    <i class="fa-solid fa-book-journal-whills fs-5 p-2 rounded-circle bg-secondary text-light"></i>
                </div>
                <p>Total E-Journals</p>
                <?php
                    $sql = "SELECT COUNT(*) AS total_e_journals FROM librarypages WHERE mainText = 'e-journals'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $totalEBooks = $row['total_e_journals'];
                        echo "<h1>$totalEBooks</h1>";
                    } else {
                        echo "<h1>0</h1>";
                    }
                ?>
            </div>
        </div>
        <div class="col-sm-10 col-lg-4"> <br>
            <div class="m-sm-5 p-sm-5 m-lg-1 p-lg-1 card shadow">
                <div class="text-end pb-5 m-2">
                    <i class="fa-solid fa-pager fs-5 p-2 rounded-circle bg-info text-light"></i>
                </div>
                <p>Total CvSU - Tanza Pages</p>
                <?php
                    $sql = "SELECT COUNT(*) AS total_cvsu_tanza_pages FROM librarypages WHERE mainText = 'cvsu tanza page'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $totalEBooks = $row['total_cvsu_tanza_pages'];
                        echo "<h1>$totalEBooks</h1>";
                    } else {
                        echo "<h1>0</h1>";
                    }
                ?>
            </div>
        </div>
    </div>
    
    <!-- <div class="row">
        <div class="row-sm-10 row-lg-4"> <br>
            <div class="m-sm-5 p-sm-5 m-lg-1 p-lg-3 border shadow">
                <h3>TOTAL COLLECTION BY COURSE</h3>
            </div>
        </div>
    </div> -->
    <br>
</div>