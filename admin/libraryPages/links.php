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
        <title>Quick Links</title>

        <link rel="stylesheet" href="../assets/style/style.css">

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
                        <h1 id="pageHeader">Quick Links</h1>
                        <div class="container p-2">
                            <button type="button" class="btn text-primary my-2 ms-4 shadow" data-bs-toggle="modal" data-bs-target="#links_modal">
                                <i class="fa-regular fa-square-plus"></i> Add Link
                            </button>
                            <div class="card shadow p-2 mb-3">
                                <h5>Academic Subscription</h5>
                                <?php
                                    $select_sql = "SELECT id, subText, links FROM librarypages WHERE pages = 'links' AND mainText = 'academic subscription'";
                                    $result = mysqli_query($conn, $select_sql);

                                    if ($result) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $id = $row['id'];
                                            $subText = $row['subText'];
                                            $link = $row['links'];
                                            // Output the hyperlink using the retrieved 'subText' and 'links'.
                                    ?>
                                            <ul>
                                                <button type="button" class="btn text-success" data-bs-toggle="modal" data-bs-target="#edit_link_Modal_<?php echo $id; ?>">
                                                    <i class="fa-regular fa-pen-to-square"></i> Edit
                                                </button>
                                                <button type="button" class="btn text-danger" data-bs-toggle="modal" data-bs-target="#delete_link_Modal_<?php echo $id; ?>">
                                                    <i class="fa-solid fa-trash"></i> Delete
                                                </button>
                                                <a class="nav-link mb-2" href="<?php echo $link; ?>"><?php echo $subText; ?></a>
                                            </ul>

                                            <!-- edit academic subscription modal-->
                                            <div class="modal fade" id="edit_link_Modal_<?php echo $id; ?>" tabindex="-1" aria-labelledby="edit_link_ModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="edit_link_ModalLabel">Edit Link</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="../assets/script/php_script/edit_links.php" method="post">
                                                                <input type="hidden" name="link_id" value="<?php echo $id; ?>">
                                                                <div class="mb-3">
                                                                    <label for="link_url">Link URL</label>
                                                                    <input class="form-control" type="text" id="link_url" name="link_url" value="<?php echo $link?>" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="link_title">Link Title</label>
                                                                    <input class="form-control" type="text" id="link_title" name="link_title" value="<?php echo $subText;?>" required>
                                                                </div>
                                                                
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-success">Save Changes</button>
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- edit academic subscription modal -->

                                            <!-- delete academic subscription modal -->
                                            <div class="modal fade" id="delete_link_Modal_<?php echo $id; ?>" tabindex="-1" aria-labelledby="delete_link_ModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="delete_link_ModalLabel">Delete Link</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure you want to delete this link?</p>
                                                            <span><strong>Link Title:</strong> <?php echo $subText;?></span>
                                                            <br>
                                                            <span><strong>Link URL:</strong> <?php echo $link;?></span>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="../assets/script/php_script/delete_link.php" method="post">
                                                                <input type="hidden" name="link_id" value="<?php echo $id; ?>">
                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- delete academic subscription modal -->

                                <?php
                                        }
                                    } else {
                                        // Handle query execution errors here.
                                        echo 'Error executing the query: ' . mysqli_error($conn);
                                    }
                                ?>
                            </div>

                            <div class="card shadow p-2 mb-3">
                                <h5>E - Books</h5>
                                <?php
                                    $select_sql = "SELECT id, subText, links FROM librarypages WHERE pages = 'links' AND mainText = 'e-books'";
                                    $result = mysqli_query($conn, $select_sql);

                                    if ($result) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $id = $row['id'];
                                            $subText = $row['subText'];
                                            $link = $row['links'];
                                            // Output the hyperlink using the retrieved 'subText' and 'links'.
                                    ?>
                                            <ul>
                                                <button type="button" class="btn text-success" data-bs-toggle="modal" data-bs-target="#edit_link_Modal_<?php echo $id; ?>">
                                                    <i class="fa-regular fa-pen-to-square"></i> Edit
                                                </button>
                                                <button type="button" class="btn text-danger" data-bs-toggle="modal" data-bs-target="#delete_link_Modal_<?php echo $id; ?>">
                                                    <i class="fa-solid fa-trash"></i> Delete
                                                </button>
                                                <a class="nav-link mb-2" href="<?php echo $link; ?>"><?php echo $subText; ?></a>
                                            </ul>

                                            <!-- edit e-books modal -->
                                            <div class="modal fade" id="edit_link_Modal_<?php echo $id; ?>" tabindex="-1" aria-labelledby="edit_link_ModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="edit_link_ModalLabel">Edit Link</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="../assets/script/php_script/edit_links.php" method="post">
                                                                <input type="hidden" name="link_id" value="<?php echo $id; ?>">
                                                                <div class="mb-3">
                                                                    <label for="link_url">Link URL</label>
                                                                    <input class="form-control" type="text" id="link_url" name="link_url" value="<?php echo $link?>" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="link_title">Link Title</label>
                                                                    <input class="form-control" type="text" id="link_title" name="link_title" value="<?php echo $subText;?>" required>
                                                                </div>
                                                                
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-success">Save Changes</button>
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- edit e-books modal -->

                                            <!-- delete e-books modal -->
                                            <div class="modal fade" id="delete_link_Modal_<?php echo $id; ?>" tabindex="-1" aria-labelledby="delete_link_ModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="delete_link_ModalLabel">Delete Link</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure you want to delete this link?</p>
                                                            <span><strong>Link Title:</strong> <?php echo $subText;?></span>
                                                            <br>
                                                            <span><strong>Link URL:</strong> <?php echo $link;?></span>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="../assets/script/php_script/delete_link.php" method="post">
                                                                <input type="hidden" name="link_id" value="<?php echo $id; ?>">
                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- delete e-books modal -->

                                <?php
                                        }
                                    } else {
                                        // Handle query execution errors here.
                                        echo 'Error executing the query: ' . mysqli_error($conn);
                                    }
                                ?>
                            </div>

                            <div class="card shadow p-2 mb-3">
                                <h5>E - Journals</h5>
                                <?php
                                    $select_sql = "SELECT id, subText, links FROM librarypages WHERE pages = 'links' AND mainText = 'e-journals'";
                                    $result = mysqli_query($conn, $select_sql);

                                    if ($result) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $id = $row['id'];
                                            $subText = $row['subText'];
                                            $link = $row['links'];
                                            // Output the hyperlink using the retrieved 'subText' and 'links'.
                                    ?>
                                            <ul>
                                                <button type="button" class="btn text-success" data-bs-toggle="modal" data-bs-target="#edit_link_Modal_<?php echo $id; ?>">
                                                    <i class="fa-regular fa-pen-to-square"></i> Edit
                                                </button>
                                                <button type="button" class="btn text-danger" data-bs-toggle="modal" data-bs-target="#delete_link_Modal_<?php echo $id; ?>">
                                                    <i class="fa-solid fa-trash"></i> Delete
                                                </button>
                                                <a class="nav-link mb-2" href="<?php echo $link; ?>"><?php echo $subText; ?></a>
                                            </ul>

                                            <!-- edit e-journals modal -->
                                            <div class="modal fade" id="edit_link_Modal_<?php echo $id; ?>" tabindex="-1" aria-labelledby="edit_link_ModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="edit_link_ModalLabel">Edit Link</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="../assets/script/php_script/edit_links.php" method="post">
                                                                <input type="hidden" name="link_id" value="<?php echo $id; ?>">
                                                                <div class="mb-3">
                                                                    <label for="link_url">Link URL</label>
                                                                    <input class="form-control" type="text" id="link_url" name="link_url" value="<?php echo $link?>" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="link_title">Link Title</label>
                                                                    <input class="form-control" type="text" id="link_title" name="link_title" value="<?php echo $subText;?>" required>
                                                                </div>
                                                                
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-success">Save Changes</button>
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- edit e-journals modal -->

                                            <!-- delete e-journals modal -->
                                            <div class="modal fade" id="delete_link_Modal_<?php echo $id; ?>" tabindex="-1" aria-labelledby="delete_link_ModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="delete_link_ModalLabel">Delete Link</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure you want to delete this link?</p>
                                                            <span><strong>Link Title:</strong> <?php echo $subText;?></span>
                                                            <br>
                                                            <span><strong>Link URL:</strong> <?php echo $link;?></span>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="../assets/script/php_script/delete_link.php" method="post">
                                                                <input type="hidden" name="link_id" value="<?php echo $id; ?>">
                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- delete e-journals modal -->

                                <?php
                                        }
                                    } else {
                                        // Handle query execution errors here.
                                        echo 'Error executing the query: ' . mysqli_error($conn);
                                    }
                                ?>
                            </div>

                            <div class="card shadow p-2 mb-3">
                                <h5>CvSU - Tanza Pages</h5>
                                <?php
                                    $select_sql = "SELECT id, subText, links FROM librarypages WHERE pages = 'links' AND mainText = 'cvsu tanza page'";
                                    $result = mysqli_query($conn, $select_sql);

                                    if ($result) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $id = $row['id'];
                                            $subText = $row['subText'];
                                            $link = $row['links'];
                                            // Output the hyperlink using the retrieved 'subText' and 'links'.
                                    ?>
                                            <ul>
                                                <button type="button" class="btn text-success" data-bs-toggle="modal" data-bs-target="#edit_link_Modal_<?php echo $id; ?>">
                                                    <i class="fa-regular fa-pen-to-square"></i> Edit
                                                </button>
                                                <button type="button" class="btn text-danger" data-bs-toggle="modal" data-bs-target="#delete_link_Modal_<?php echo $id; ?>">
                                                    <i class="fa-solid fa-trash"></i> Delete
                                                </button>
                                                <a class="nav-link mb-2" href="<?php echo $link; ?>"><?php echo $subText; ?></a>
                                            </ul>

                                            <!-- edit cvsu tazna page modal -->
                                            <div class="modal fade" id="edit_link_Modal_<?php echo $id; ?>" tabindex="-1" aria-labelledby="edit_link_ModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="edit_link_ModalLabel">Edit Link</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="../assets/script/php_script/edit_links.php" method="post">
                                                                <input type="hidden" name="link_id" value="<?php echo $id; ?>">
                                                                <div class="mb-3">
                                                                    <label for="link_url">Link URL</label>
                                                                    <input class="form-control" type="text" id="link_url" name="link_url" value="<?php echo $link?>" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="link_title">Link Title</label>
                                                                    <input class="form-control" type="text" id="link_title" name="link_title" value="<?php echo $subText;?>" required>
                                                                </div>
                                                                
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-success">Save Changes</button>
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- edit cvsu tazna page modal -->

                                            <!-- delete cvsu tazna page modal -->
                                            <div class="modal fade" id="delete_link_Modal_<?php echo $id; ?>" tabindex="-1" aria-labelledby="delete_link_ModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="delete_link_ModalLabel">Delete Link</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure you want to delete this link?</p>
                                                            <span><strong>Link Title:</strong> <?php echo $subText;?></span>
                                                            <br>
                                                            <span><strong>Link URL:</strong> <?php echo $link;?></span>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="../assets/script/php_script/delete_link.php" method="post">
                                                                <input type="hidden" name="link_id" value="<?php echo $id; ?>">
                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- delete cvsu tazna page modal -->

                                <?php
                                        }
                                    } else {
                                        // Handle query execution errors here.
                                        echo 'Error executing the query: ' . mysqli_error($conn);
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
            function checkOption() {
                var selectElement = document.getElementById("linkType");
                var submitButton = document.getElementById("submitButton");
                var errorMessage = document.getElementById("errorMessage");
                
                if (selectElement.value !== "default") {
                    submitButton.disabled = false;
                } else {
                    submitButton.disabled = true;
                    alert('Please select a decline option.');
                }
            }
        </script>
    </body>
</html>