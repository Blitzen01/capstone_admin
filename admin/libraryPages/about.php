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
        <title>About</title>

        <link rel="stylesheet" href="../assets/style/style.css">

    </head>

    <body>
        <?php include '../adminNavigation/header.php' ?>

        <div id="admin-body" class="pt-5">
            <div class="row pt-2">
                <div class="col-lg-3">
                    <?php include '../adminNavigation/sidebar.php'; ?>
                </div>
                <div class="col-lg-9">
                    <section>
                        <h1 id="pageHeader">About</h1>
                        <div class="container">
                            <p class="fs-4 fw-bold">University Vision and Mission</p>
                            
                            <div class="mb-5">
                                <span class="fs-5" id="vision">Vision</span>
                                
                                <!-- diplaying vision -->
                                <p class="border p-2 m-2" id="vision">
                                <?php
                                    $select_sql = "SELECT subText FROM librarypages WHERE mainText = 'vision'";
                                    $select_sql1 = mysqli_query($conn, $select_sql);
                                    while($vision = mysqli_fetch_array($select_sql1)) {
                                            ?>
                                                <button class="btn"><i class="fa-solid fa-pen-to-square text-success"  data-bs-toggle="modal" data-bs-target="#edit_vision"></i></button>
                                                <?php echo $vision['subText']; ?>
                                                
                                            <?php
                                    }
                                    ?>
                                </p>
                            </div>
                            
                            <div class="mb-5">
                                <span class="fs-5" id="mission">Mission</span>
                                <!-- diplaying mission -->
                                <p class="border p-2 m-2" id="mission">
                                    <?php
                                    $select_sql = "SELECT subText FROM librarypages WHERE mainText = 'mission'";
                                    $select_sql1 = mysqli_query($conn, $select_sql);
                                    while($mission = mysqli_fetch_array($select_sql1)) {
                                            ?>
                                                <button class="btn"><i class="fa-solid fa-pen-to-square text-success"  data-bs-toggle="modal" data-bs-target="#edit_mission"></i></button>
                                                <?php echo $mission['subText'] ?>
                                                
                                            <?php
                                    }
                                    ?>

                                </p>
                            </div>

                            <p id="objective" class="fs-4 fw-bold">
                                Library Objectives
                                <button type="button" class="btn text-primary" data-bs-toggle="modal" data-bs-target="#library_objectives">
                                    <i class="fa-regular fa-square-plus"></i>
                                </button>
                            </p>
                            
                            <div class="border mb-5 p-2">
                                <?php
                                    $select_sql = "SELECT id, subText FROM librarypages WHERE pages = 'about' AND mainText = 'objective'";
                                    $result = mysqli_query($conn, $select_sql);

                                    while($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <ul>
                                            <button type="button" class="btn text-success edit-objective" data-id="<?php echo $row['id']; ?>" data-subtext="<?php echo $row['subText']; ?>">
                                                <i class="fa-solid fa-pen-to-square"></i> Edit
                                            </button>
                                            <button type="button" class="btn text-danger delete-objective" data-id="<?php echo $row['id']; ?>" data-subtext="<?php echo $row['subText']; ?>">
                                                <i class="fa-solid fa-trash"></i> Delete
                                            </button>
                                            <?php echo $row['subText']; ?>
                                        </ul>
                                    <?php
                                    }
                                ?>
                            </div>


                            <p class="fs-4 fw-bold">
                                Library Rules and Regulations
                                <button type="button" class="btn text-primary" data-bs-toggle="modal" data-bs-target="#library_rules">
                                    <i class="fa-regular fa-square-plus"></i>
                                </button>
                            <div class="border mb-5 p-2">
                                <?php
                                    $select_sql = "SELECT id, subText FROM librarypages WHERE pages = 'about' AND mainText = 'rules'";
                                    $result = mysqli_query($conn, $select_sql);

                                    while($row = mysqli_fetch_assoc($result)) {
                                ?>
                                        <ul>
                                            <button type="button" class="btn text-success edit-rules" data-id="<?php echo $row['id']; ?>" data-subtext="<?php echo $row['subText']; ?>">
                                                <i class="fa-solid fa-pen-to-square"></i> Edit
                                            </button>
                                            <button type="button" class="btn text-danger delete-rules" data-id="<?php echo $row['id']; ?>" data-subtext="<?php echo $row['subText']; ?>">
                                                <i class="fa-solid fa-trash"></i> Delete
                                            </button>
                                            <?php echo $row['subText']; ?>
                                        </ul>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>




        <script src="../assets/script/script.js"></script>

        <script>
            $(document).ready(function() {
                // Edit Objective Modal
                $('.edit-objective').click(function() {
                    var id = $(this).data('id');
                    var subText = $(this).data('subtext');
                    
                    // Populate modal content with data
                    $('#editObjectiveModal .modal-body textarea').val(subText).attr('rows', 8);
                    $('#editObjectiveModal #editModalId').val(id);

                    // Show modal
                    $('#editObjectiveModal').modal('show');
                });

                // Delete Objective Modal
                $('.delete-objective').click(function() {
                    var id = $(this).data('id');
                    var subText = $(this).data('subtext');
                    
                    // Populate modal content with data
                    $('#deleteObjectiveModal #subTextTextarea').val(subText).attr('rows', 8);
                    $('#deleteObjectiveModal #deleteModalId').val(id); // Set the value of the hidden input with the ID
                    $('#objectiveContent').text(subText); // Display the objective content in the modal body

                    // Show modal
                    $('#deleteObjectiveModal').modal('show');
                });

                $('.edit-rules').click(function() {
                    var id = $(this).data('id');
                    var subText = $(this).data('subtext');
                    
                    // Populate modal content with data
                    $('#editRulesModal .modal-body textarea').val(subText).attr('rows', 8);
                    $('#editRulesModal #editModalId').val(id);

                    // Show modal
                    $('#editRulesModal').modal('show');
                });

                // Delete Objective Modal
                $('.delete-rules').click(function() {
                    var id = $(this).data('id');
                    var subText = $(this).data('subtext');
                    
                    // Populate modal content with data
                    $('#deleteRulesModal #subTextTextarea').val(subText).attr('rows', 8);
                    $('#deleteRulesModal #deleteModalId').val(id); // Set the value of the hidden input with the ID
                    $('#rulesContent').text(subText); // Display the objective content in the modal body

                    // Show modal
                    $('#deleteRulesModal').modal('show');
                });
            });
        </script>

    </body>
</html>