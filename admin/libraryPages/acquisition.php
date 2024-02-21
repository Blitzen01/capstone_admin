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
        <title>Acquisition</title>

        <link rel="stylesheet" href="../assets/style/style.css">

        <style>
            /* Hide the spinners on number input */
            #year_input::-webkit-inner-spin-button,
            #year_input::-webkit-outer-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }

            #year_input {
                /* Firefox */
                -moz-appearance: textfield;
            }
            .accordion-header button {
                background-color: transparent !important;
                border: none !important;
                outline: none !important;
                box-shadow: none !important;
            }
            .accordion-header button::after {
                display: none;
            }
            .accordion-item {
                border: none !important;
            }
            .accordion-item:not(.collapsed) {
                background-color: transparent !important;
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
                        <h1 id="pageHeader">Acquisition</h1>
                        <div class="container p-2">
                            <button type="button" class="btn text-primary my-2 ms-4 shadow" data-bs-toggle="modal" data-bs-target="#acquisition_modal">
                                <i class="fa-regular fa-square-plus"></i> New Acquisition
                            </button>
                            <div class="">
                                <?php
                                // Query to fetch data including author, year_publish, and title grouped by year
                                $sql = "SELECT YEAR(year_acquired) AS year, author, year_publish, title
                                        FROM acquisition
                                        ORDER BY year_acquired DESC";
                                $result = $conn->query($sql);

                                // Store the data in an associative array
                                $data = [];
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $data[$row['year']][] = $row;
                                    }
                                }
                                ?>

                                <div class="accordion accordion-flush" id="accordionFlushExample">
                                    <?php foreach ($data as $year => $books): ?>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="flush-heading<?php echo $year; ?>">
                                                <button class="accordion-button collapsed text-success" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?php echo $year; ?>" aria-expanded="false" aria-controls="flush-collapse<?php echo $year; ?>">
                                                    NEW ARRIVAL BOOKS <?php echo $year; ?>
                                                </button>
                                            </h2>
                                            <div id="flush-collapse<?php echo $year; ?>" class="accordion-collapse collapse" aria-labelledby="flush-heading<?php echo $year; ?>" data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body">
                                                    <?php foreach ($books as $book): ?>
                                                        <span class="fs-6">
                                                            <?php echo $book['author']; ?>, (<?php echo $book['year_publish']; ?>). <?php echo $book['title']; ?>
                                                        </span>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
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