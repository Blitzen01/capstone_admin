<?php
    include "../assets/cdn/cdn_links.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Moderators</title>
        <link rel="stylesheet" href="../assets/style/moderator_login_style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    </head>
    <body>
        <div class="container">
            <div class="wrapper">
                <div class="title"><img class="login_logo" src="../assets/image/cvsu_library.png" alt=""></div>
                <?php
                    if(isset($_GET['error']) && $_GET['error'] == 1) {
                        echo "<p id='errorMessage' class='text-danger text-center'>Invalid username or password. Please try again.</p>";
                    }
                ?>
                <form action="login.php" method="post">
                    <div class="row">
                        <i class="fas fa-user"></i>
                        <input type="text" name="username" placeholder="Username" required autocomplete="off">
                    </div>
                    <div class="row">
                        <i class="fas fa-lock"></i>
                        <input id="password" type="password" name="password" placeholder="Password" required>
                        <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    </div>
                    <div class="pass"><a href="#">Forgot password?</a></div>
                    <div class="row button">
                        <input type="submit" value="Login">
                    </div>
                </form>
            </div>
        </div>

        <script>
            // JavaScript to toggle password visibility
            const togglePassword = document.querySelector('.toggle-password');
            const passwordField = document.querySelector('#password');

            togglePassword.addEventListener('click', function () {
                const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordField.setAttribute('type', type);
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            });

            setTimeout(function() {
                var errorMessage = document.getElementById('errorMessage');
                if(errorMessage) {
                    errorMessage.style.display = 'none';
                }
            }, 3000); // 3000 milliseconds = 3 seconds
        </script>
    </body>
</html>