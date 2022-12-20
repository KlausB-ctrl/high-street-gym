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
        <title>Register | High Street Gym</title>
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    <body>
        <script src="../js/components/header.js"></script>
        <main class="gray_background --flexcentre-column">
            <div class="blue_background"></div>
            <h1 class="login_header">Register</h1>
            <div class="white_background --flexcentre" id="--login">
                <div class="profile_content">
                    <h2>Sign Up</h2>
                    <form action="../php/register-account.php" method="post">
                        <div>
                            <label for="first-name">First Name</label>
                            <input name="first-name" id="first-name" maxlength="50" required>
                        </div>
                        <div>
                            <label for="last-name">Last Name</label>
                            <input name="last-name" id="last-name" maxlength="50" required>
                        </div>
                        <div>
                            <label for="email">Email</label>
                            <input name="email" id="email" type="email" maxlength="255" required>
                        </div>
                        <div>
                            <label for="phone">Phone <strong>(optional)</strong></label>
                            <input name="phone" id="phone" maxlength="30">
                        </div>
                        <div>
                            <label for="password-input">Password</label>
                            <input name="password" id="password-input" type="password" minlength="8" maxlength="128" required>
                        </div>
                        <div>
                            <label for="re-enter-password-input">Re-enter password</label>
                            <input name="re-enter-password" id="re-enter-password-input" type="password" maxlength="128" required>
                        </div>
                        <div>
                            <ul>
                                <li id="lowercase_indicator">One lowercase character</li>
                                <li id="uppercase_indicator">One uppercase character</li>
                                <li id="number_indicator">One number</li>
                            </ul>
                        </div>
                        <div>
                            <ul>
                                <li id="specialchar_indicator">One special character</li>
                                <li id="minimumchar_indicator">8 characters minimum</li>
                            </ul>
                        </div>
                        <div class="--span_two_columns">
                            <p id="account-error-message">
                                <?php 
                                if(isset($_GET['invalid'])) {
                                    if($_GET['invalid'] == 'email') {
                                        echo "Email is already in use.";
                                    } else if($_GET['invalid'] == 'phone') {
                                        echo "Phone number is already in use.";
                                    } else if($_GET['invalid'] == 'passwordmatch') {
                                        echo "The passwords that were entered did not match.";
                                    }
                                }
                                ?>
                            </p>
                        </div>
                        <div class="--span_two_columns">
                            <button id="login_button" disabled>REGISTER</button>
                        </div>
                    </form>
                    <div id="sign_up">
                        <p>Already have an account? </p><a href="login.php">SIGN IN</a>
                    </div>
                </div>
            </div>
        </main>
        <script src="../js/components/footer.js"></script>
        <script src="../js/functions/check-password.js"></script>
    </body>
    </html>