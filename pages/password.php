<?php
include "../model/connect.php";
session_start();

if(!isset($_SESSION['id'])) {
    header("Location: ./login.php");
    exit();
}

// Define relevant variables
$first_name = $_SESSION['first-name'];
$last_name = $_SESSION['last-name'];

?>
<!DOCTYPE html>
    <html lang="en-gb">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Password | Profile | High Street Gym</title>
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    <body>
        <script src="../js/components/header.js"></script>
        <main class="gray_background --flexcentre-column">
            <div class="blue_background"></div>
            <h1>Profile</h1>
            <div class="white_background --flexcentre">
                <script src="../js/components/profile-navigation.js"></script>
                <div class="profile_content">
                    <h2>Change Password</h2>
                    <p>To ensure your account is protected, your password should:</p>
                    <ul>
                        <li id="minimumchar_indicator">Be at least 8 characters</li>
                        <li id="lowercase_indicator">Contain at least 1 lowercase character</li>
                        <li id="uppercase_indicator">Contain at least 1 uppercase character</li>
                        <li id="number_indicator">Contain a number</li>
                        <li id="specialchar_indicator">Contain a special character</li>
                    </ul>
                    <form action="../php/change-password.php" method="post">
                        <div class="--span_two_columns">
                            <label for="new-password">New Password</label>
                            <input id="new-password" name="new-password">
                        </div>
                        <div class="--span_two_columns">
                            <label for="re-entered_password">Re-Enter New Password</label>
                            <input id="re-entered_password" name="re-entered_password">
                        </div>
                        
                            <?php
                            if(isset($_GET['update'])) {
                                echo "<p id='account-success-message' class='--span_two_columns'>Password successfully updated.</p>";
                            } else if(isset($_GET['invalid'])) {
                                    if($_GET['invalid'] == 'passwordmatch') {
                                        echo "<p id='account-error-message' class='--span_two_columns'>The passwords entered did not match.</p>";
                                    }
                                } 
                            ?>
                        <div>
                            <button id="update-button" disabled>UPDATE</button>
                            <button type="reset" value="Reset">CANCEL</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
        <script src="../js/components/footer.js"></script>
        <input id="first_name" hidden value=<?php echo $first_name; ?>>
        <input id="last_name" hidden value=<?php echo $last_name; ?>>
        <script src="../js/functions/check-updated-password.js"></script>
        <script src="../js/functions/profile-append-name.js"></script>
    </body>
    </html>