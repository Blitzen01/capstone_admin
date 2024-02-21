<div class="row pb-5">
    <div class="col-lg-4 col-sm-12 px-5">
        <div class="col text-center admin-profile">
            <div class="dropdown">
                <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php
                    if ($row['user_picture'] != NULL) {
                        $user_picture = $row['user_picture']; // Ensure $user_picture is properly assigned
                        ?>
                        <div class="square-image-container">
                            <img class="border border-dark rounded-circle shadow profile_picture" src="../moderator_account/moderator_profile_picture/<?php echo $user_picture; ?>" alt="">
                        </div>
                        <?php
                    } else {
                        ?>
                        <img class="profile_picture border border-dark rounded-circle shadow" src="../render/uploads/images/profile_picture.jpg" alt="">
                        <?php
                    }
                    ?>
                </a>
                <ul class="dropdown-menu">
                    <?php
                        if($row['user_picture'] != NULL) {
                            ?>
                            <li><a class="btn dropdown-item" data-bs-toggle="modal" data-bs-target="#see_profile_picture">See profile picture</a></li>
                            <li><a class="btn dropdown-item" data-bs-toggle="modal" data-bs-target="#change_profile_picture">Update profile picture</a></li>
                            <li><a class="btn dropdown-item" data-bs-toggle="modal" data-bs-target="#remove_profile_picture">Remove profile picture</a></li>
                            <?php
                        } else {
                            ?>
                            <li><a class="btn dropdown-item" data-bs-toggle="modal" data-bs-target="#change_profile_picture">Update profile picture</a></li>
                            <?php
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-sm-12">
        <div class="row px-2 card m-2">
            <span><strong>Email:</strong> <?php echo $row['user_email'];?></span>
        </div>
        <div class="row card px-2 m-2">
            <span><strong>Faculty Number:</strong> <?php echo $row['user_faculty_number'];?></span>
        </div>
        <div class="row card px-2 m-2">
            <span><strong>Member Type:</strong> <?php echo $row['user_member_type'];?></span>
        </div>
        <div class="row card px-2 m-2">
            <span><strong>Username:</strong> <?php echo $row['user_username'];?></span>
        </div>
        <div class="row card px-2 m-2">
            <span>
            <strong>Password:</strong>
            <?php
                // Mask the first 10 characters of the hashed password with asterisks
                $hashedPassword = $password;
                $maskedPassword = str_repeat("*", strlen($hashedPassword));
                echo $maskedPassword;
            ?>
            </span>
            <button class="nav-link fs-small text-primary text-start ps-3" data-bs-toggle="modal" data-bs-target="#change_password">change password</button>
        </div>
    </div>
</div>
<!-- Button trigger modal -->
<button type="button" class="nav-link bg-success text-light" data-bs-toggle="modal" data-bs-target="#update_profile">
    Update Profile/Personal Information
</button>