<?php
    include 'connection.php';
    include '../assets/cdn/cdn_links.php';
    include '../assets/fonts/fonts.php';

    if(isset($_GET['subText']) && isset($_GET['id']) && isset($_GET['page'])) {
        $id = $_GET['id'];
        $page = $_GET['page'];
        $subText = $_GET['subText'];
    
        // $subText = "SELECT subText FROM librarypages WHERE mainText = '$mainText'";
        // $qry = mysqli_query($conn, $subText);
    
        // if(mysqli_num_rows($qry)) {
        //     $print = ''; // Initialize the $print variable
        //     while($items = mysqli_fetch_array($qry)) {
        //         $print = $items['subText']; // Store the last value retrieved from the database
        //     }
        // }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit</title>
        
        <link rel="stylesheet" href="../assets/style/style.css">

    </head>

    <body>
        <?php
            if($page == 'services') {
                ?>
                    <div class="container p-5">
                        <form method="post">
                            <textarea class="mt-3 mb-3" name="editService" id="editService" cols="30" rows="10"><?php echo $subText; ?></textarea><br>
                            <div class="text-end">
                                <button class="btn btn-success ms-auto" name="update" type="submit">SAVE</button>
                                <button class="btn btn-danger"><a class="nav-link" href="../libraryPages/<?php echo $page; ?>.php#<?php echo $id; ?>">CANCEL</a></button>
                            </div>
                        </form>

                        <?php
                            if (isset($_POST['update'])) {
                                // Get the edited mission text from the form
                                $editText = $_POST['editService'];
                            
                                // Update the data in the database
                                $mainText = $id; // Sanitize input
                                $editText = mysqli_real_escape_string($conn, $editText); // Sanitize input
                            
                                // Construct the SQL update query using prepared statement
                                $updateQuery = "UPDATE librarypages SET subText = ? WHERE mainText = ?";
                                $stmt = mysqli_prepare($conn, $updateQuery);
                            
                                // Bind parameters
                                mysqli_stmt_bind_param($stmt, "ss", $editText, $mainText);
                            
                                // Execute the update query
                                if (mysqli_stmt_execute($stmt)) {
                                    echo '<script type="text/javascript">location.href = "../librarypages/services.php";</script>';
                                } else {
                                    echo "Error updating data: " . mysqli_error($conn);
                                }
                            
                                // Close the prepared statement
                                mysqli_stmt_close($stmt);
                            }                                                   
                        ?>
                    </div>
                <?php
            }
        ?>

        <script src="../assets/script/script.js"></script>
        
        <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
        <script>
            ClassicEditor
                .create( document.querySelector( '#editService' ) )
                .catch( error => {
                    console.error( error );
                } );
        </script>
    </body>
</html>