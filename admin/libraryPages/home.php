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
        <title>Home</title>

        
        <link rel="stylesheet" href="../assets/style/style.css">

        <style>
            /* admin home | embed */
            .embed-container {
                max-width: 100%;
                overflow: hidden;
            }

            .custom-embed {
                position: relative;
                /* Adjust the padding-bottom value for your desired aspect ratio */
                padding-bottom: 125%; /* Example: 3:4 aspect ratio */
                height: 0;
                overflow: hidden;
                max-width: 100%;
            }

            .custom-embed iframe,
            .custom-embed object,
            .custom-embed embed {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
            }
            /* admin home | embed */

            /* resign for the mobile device */
            @media screen and (max-width: 600px) {
                .custom-embed {
                    padding-bottom: 200%;
                }
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
                        <h1 id="pageHeader">Home</h1>
                        
                        <div class="text-center mx-auto w-lg-40 ">
                            <button class="btn mt-2 mb-5 w-100" data-bs-toggle="modal" data-bs-target="#create_announcement_modal">
                                <div class="shadow border rounded">
                                    <div class="col-lg-10 my-1 mx-auto">
                                        <div class="row text-center pb-2">
                                            <span class="border border-dark rounded-pill p-2 post-text">CREATE ANNOUNCEMENT</span>
                                        </div>
                                        <div class="row post-text-icon">
                                            <div class="col border border-dark rounded-pill m-1 fs-small">
                                                <span><i class="fa-solid fa-camera"></i>PHOTO</span>
                                            </div>
                                            <div class="col border border-dark rounded-pill m-1 fs-small">
                                                <span><i class="fa-solid fa-video"></i>VIDEO</span>
                                            </div>
                                            <div class="col border border-dark rounded-pill m-1 fs-small">
                                                <span><i class="fa-solid fa-link"></i>EMBED</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </button>

                            <div>
                                <?php
                                # Select data
                                $select_sql = "SELECT * FROM createpost ORDER BY timestamp DESC";
                                $select_sql1 = mysqli_query($conn, $select_sql);

                                if ($select_sql1) { // Check if the query was successful
                                    while ($row = mysqli_fetch_array($select_sql1)) {
                                        ?>
                                        <div class="row shadow border rounded mb-3">
                                            <div class="row">
                                                <div class="col-6 me-auto">
                                                    <?php 
                                                        // Convert timestamp to UNIX timestamp and then format it
                                                        $formattedTimestamp = date("M. d, Y h:i A", strtotime($row['timestamp']));
                                                        echo $formattedTimestamp; 
                                                    ?>
                                                </div>
                                                <div class="col-1 ms-auto">
                                                    <button class="btn delete-post-btn" data-post-id="<?php echo $row['id']; ?>" data-bs-toggle="modal" data-bs-target="#confirm_delete_modal"><i class="fa-solid fa-x"></i></button>
                                                </div>
                                            </div>
                                            <div class="col-lg-10 mx-auto">
                                                <?php if (isset($row['text']) || isset($row['image_url']) || isset($row['video_url'])) { ?>
                                                    <div class="mb-3 pb-3 px-auto text-center border rounded">
                                                        <?php if (isset($row['text'])) { ?>
                                                            <p><?php echo $row['text']; ?></p>
                                                        <?php } ?>

                                                        <?php if (isset($row['image_url']) && !empty($row['image_url'])) {
                                                            $images = explode(',', $row['image_url']);
                                                            if (!empty($images)) {
                                                                foreach ($images as $image) { ?>
                                                                    <img src="../render/uploads/images/<?php echo $image; ?>" alt="" srcset="" class="mb-2">
                                                                <?php }
                                                            }
                                                        } ?>

                                                        <?php if (isset($row['video_url']) && !empty($row['video_url'])) { ?>
                                                            <video width="100%" height="auto" controls class="mb-2">
                                                                <source src="../render/uploads/videos/<?php echo $row['video_url']; ?>" type="video/mp4">
                                                                Your browser does not support the video tag.
                                                            </video>
                                                        <?php } ?>

                                                        <?php if (isset($row['embed_code']) && !empty($row['embed_code'])) { ?>
                                                            <div class="embed-container p-2">
                                                                <div class="custom-embed">
                                                                    <?php echo $row['embed_code']; ?>
                                                                </div>
                                                            </div>
                                                        <?php } ?>

                                                    </div>
                                                <?php } else { ?>
                                                    <p>No content available</p>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                } else {
                                    echo "Error: " . mysqli_error($conn); // Output the error message
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
            // AJAX script for deleting announcement
            $(document).ready(function () {
                $('.delete-post-btn').click(function (e) {
                    e.preventDefault(); // Prevent the default action (redirect)

                    // Get the post ID from the data attribute
                    var postId = $(this).data('post-id');

                    // Fetch the post details based on the post ID via AJAX
                    $.ajax({
                        url: '../assets/script/php_script/fetch_post_details.php', // Change the URL to your PHP script that fetches post details
                        method: 'GET',
                        data: { postId: postId },
                        success: function (response) {
                            // Update the modal content with the fetched post details
                            $('#confirm_delete_modal .modal-body').html(response);
                            // Show the modal
                            $('#confirm_delete_modal').modal('show');
                        },
                        error: function (xhr, status, error) {
                            // Handle errors
                            console.error(xhr.responseText);
                        }
                    });
                });
            });


                // AJAX script for deleting announcement

        </script>
        
    </body>
</html>

<!-- confirm delete Modal -->
<div class="modal fade" id="confirm_delete_modal" tabindex="-1" aria-labelledby="confirm_delete_moodal_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="confirm_delete_moodal_label">Confirm Delete</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <p>Are you sure you want to delete the following announcement?</p>
                <div class="col card m-3 p-2">
                    <div class="mb-3 pb-3 px-auto text-center">
                        <?php if (isset($row['text'])) { ?>
                            <p><?php echo $row['text']; ?></p>
                        <?php } ?>

                        <?php if (isset($row['image_url']) && !empty($row['image_url'])) {
                            $images = explode(',', $row['image_url']);
                            if (!empty($images)) {
                                foreach ($images as $image) { ?>
                                    <img src="../render/uploads/images/<?php echo $image; ?>" alt="" srcset="" class="mb-2">
                                <?php }
                            }
                        } ?>

                        <?php if (isset($row['video_url']) && !empty($row['video_url'])) { ?>
                            <video width="100%" height="auto" controls class="mb-2">
                                <source src="../render/uploads/videos/<?php echo $row['video_url']; ?>" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        <?php } ?>

                        <?php if (isset($row['embed_code']) && !empty($row['embed_code'])) { ?>
                            <div class="embed-container">
                                <?php echo $row['embed_code']; ?>
                            </div>
                        <?php } ?>
                    </div>
                    </div>
                <form class="m-2 text-end" action="../render/delete_post.php" method="post">
                    <input type="hidden" name="postId" value="<?php echo $postId; ?>">
                    <input class="btn btn-danger" type="submit" value="Delete">
                </form>
            </div>
        </div>
    </div>
</div>
<!-- confirm delete Modal -->