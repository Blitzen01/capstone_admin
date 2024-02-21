<?php
    include '../render/connection.php';
    include '../assets/cdn/cdn_links.php';
    include '../assets/fonts/fonts.php';
    
?>
    
    <?php
    // Check if postId is set in the URL parameters
    if (isset($_GET['postId'])) {
        $postId = $_GET['postId'];

        // Fetch the post details based on the post ID
        $select_sql = "SELECT * FROM createpost WHERE id = $postId";
        $result = mysqli_query($conn, $select_sql);

        if ($result) {
            $row = mysqli_fetch_array($result);

            // Display post details and a confirmation form
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <!-- Include your CSS and meta tags -->
                <title>Confirm Delete</title>

                <link rel="stylesheet" href="../../assets/style/style.css">
                
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
                <div class="container text-center mt-5 w-lg-40">
                    <div class="col card mx-auto">
                        <div class="text-end p-2">
                            <a href="../libraryPages/home.php"><button class="btn"><i class="fa-solid fa-xmark"></i></button></a>
                        </div>

                        <h1>Confirm Delete</h1>
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
                
            </body>
            </html>
            <?php
        } else {
            echo 'Error fetching post details: ' . mysqli_error($conn);
        }
    } else {
        echo 'Post ID not provided.';
    }
?>
