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
        <title>Services</title>

        <link rel="stylesheet" href="../assets/style/style.css">

        <style>       
            .form-control:focus {
                border-color: rgb(0, 190, 25) !important;
                box-shadow: 0 0 0 0.2rem rgb(0,114,5,0.25) !important;
            }
        </style>
    </head>
    
    <body>
        <?php include '../adminNavigation/header.php'; ?>
        
        <div id="admin-body" class="pt-2">
            <div class="row pt-5">
                <div class="col-lg-3">
                    <?php include '../adminNavigation/sidebar.php'; ?>
                </div>
                <div class="col-lg-9">
                    <section>
                    <h1 id="pageHeader">Services</h1>
                    <div class="container-fluid ps-5">
                        <h4>Add new Service <button id="addServiceBtn" class="btn m-3 border"><a class="nav-link" href="../render/add.php?id=0&page=services"><i class="fa-solid fa-plus"></i></a></button></h4>
                        <?php
                            $select_sql = "SELECT subText, mainText FROM librarypages WHERE pages = 'services'";
                            $result = mysqli_query($conn, $select_sql);

                            while ($row = mysqli_fetch_assoc($result)) {
                                $subText = $row['subText'];

                                // Use prepared statement to avoid SQL injection
                                $select_sql1 = "SELECT mainText FROM librarypages WHERE subText = ?";
                                $stmt = mysqli_prepare($conn, $select_sql1);
                                mysqli_stmt_bind_param($stmt, "s", $subText);
                                mysqli_stmt_execute($stmt);
                                mysqli_stmt_bind_result($stmt, $mainText);

                                while (mysqli_stmt_fetch($stmt)) {
                                    ?>
                                    <ul class="border mb-5 p-2">
                                        <a class="nav-link text-success" href="../render/edit.php?page=services&id=<?php echo $mainText ?>&subText=<?php echo $subText ?>">
                                            <i class="fa-solid fa-pen-to-square"></i> Edit
                                        </a>
                                        <a class="nav-link text-danger hover" href="../render/delete.php?page=services&id=<?php echo $mainText ?>&subText=<?php echo $subText ?>">
                                            <i class="fa-solid fa-trash"></i> Delete
                                        </a>

                                        <?php echo $subText; ?>
                                    </ul>
                                    <?php
                                }

                                mysqli_stmt_close($stmt);
                            }

                            mysqli_close($conn);
                        ?>
                    </div>

                </section>
                </div>
            </div>
        </div>
        
        <script src="../assets/script/script.js"></script>
        

    </body>
</html>