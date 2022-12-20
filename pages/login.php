<?php 
include "../model/connect.php";

session_start();

if(isset($_SESSION['id'])) {
    header("Location: ./account-details.php");
    exit();
}

?>
<!DOCTYPE html>
    <html lang="en-gb">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login | High Street Gym</title>
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    <body>
        <script src="../js/components/header.js"></script>
        <main class="gray_background --flexcentre-column">
            <div class="blue_background"></div>
            <h1 class="login_header">Login</h1>
            <div class="white_background --flexcentre" id="--login">
                <div class="profile_content">
                    <h2>Welcome Back!</h2>
                    <form action="../php/attempt-login.php" method="post">
                        <div class="--span_two_columns">
                            <label for="email">Email</label>
                            <input name="email" id="email" type="email" required>
                        </div>
                        <div class="--span_two_columns">
                            <label for="password">Password</label>
                            <input name="password" id="password" type="password" required>
                        </div>
                        <div class="--span_two_columns">
                            <p id="account-error-message">
                                <?php
                                if(isset($_GET['invalid'])) {
                                    if($_GET['invalid'] == 'email') {
                                        echo "There is no account registered with that email address.";
                                    } else if($_GET['invalid'] == 'password') {
                                        echo "The password or email is incorrect.";
                                    }
                                }
                                ?>
                            </p>
                        </div>
                        <div class="--span_two_columns">
                            <button id="login_button">LOGIN</button>
                        </div>
                    </form>
                    <div id="forgot_password">
                        <a href="https://au.pcmag.com/password-managers/4524/the-best-password-managers">Forgot password?</a>
                    </div>
                    <div id="sign_up">
                        <p>Need an account? </p><a href="register.php">SIGN UP</a>
                    </div>
                </div>
            </div>
        </main>
        <script src="../js/components/footer.js"></script>
    </body>
    </html>