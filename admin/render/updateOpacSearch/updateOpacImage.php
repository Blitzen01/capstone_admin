<?php
    include '../connection.php';
    include '../../assets/cdn/cdn_links.php';
    include '../../assets/fonts/fonts.php';

    // Corrected SELECT query
    $stmt = $pdo->prepare("SELECT subText FROM librarypages WHERE mainText = 'background' AND pages = 'opacSearch'");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        // Check if $result is not false before accessing its values
        $currentSubText = $result['subText'];
    } else {
        // Handle the case where the query did not return any result
        echo "No result found for the given parameters.";
    }

    if(isset($_POST['opac_bg_save'])) {
        $subText = '';

        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $uploadedFile = $_FILES['image'];
            $imageUploadDirectory = "../uploads/images/";
            $uploadPath = $imageUploadDirectory . basename($uploadedFile['name']);

            if (move_uploaded_file($uploadedFile['tmp_name'], $uploadPath)) {
                // File upload successful
                // Update the database with the new subText and image name
                $subText = $uploadedFile['name'];

                $sql = "UPDATE librarypages SET subText = :subText WHERE mainText = 'background' AND pages = 'opacSearch'";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':subText', $subText);
                $stmt->execute();

                echo "<script>window.location.href = '../../librarypages/opacSearch.php';</script>";
            } else {
                // File upload failed
                echo "Failed to upload the image.";
            }
        } else {
            // No file uploaded
            echo "Please choose an image to upload.";
        }
    }
?>