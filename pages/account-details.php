<?php 
include "../model/connect.php";
session_start();
if(!isset($_SESSION['id'])) {
    header("Location: ./login.php");
    exit();
}

$user_id = $_SESSION['id'];

$profile_sql = "SELECT * FROM user WHERE user_id = $user_id";
$profile_statement = $conn->prepare($profile_sql);
$profile_statement->execute();
$profile_result = $profile_statement->fetchAll();
$profile_statement->closeCursor();

$user_profile = $profile_result[0];

$user_first_name = $user_profile['user_first_name'];
$user_last_name = $user_profile['user_last_name'];
$user_email_address = $user_profile['user_email_address'];
$user_phone_number = $user_profile['user_phone_number'];
$user_bio = $user_profile['user_bio'];

?>
<!DOCTYPE html>
    <html lang="en-gb">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Account Details | Profile | High Street Gym</title>
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
                    <h2>Account Details</h2>
                    <form action="../php/update-profile.php" method="post">
                        <div>
                            <label for="first_name">First Name</label>
                            <input name="first_name" id="first_name" maxlength="50" required value=<?php echo $user_first_name; ?>>
                        </div>
                        <div>
                            <label for="last_name">Last Name</label>
                            <input name="last_name" id="last_name" maxlength="50" required value=<?php echo $user_last_name; ?>>
                        </div>
                        <div>
                            <label for="email">Email</label>
                            <input name="email" id="email" type="email" maxlength="255" required value=<?php echo $user_email_address; ?>>
                        </div>
                        <div>
                            <label for="phone">Phone</label>
                            <input name="phone" id="phone" minlength="8" maxlength="30" value=<?php echo $user_phone_number; ?>>
                        </div>
                        <div class="--span_two_columns">
                            <label for="bio">Bio</label>
                            <textarea name="bio" id="bio"><?php echo $user_bio; ?></textarea>
                        </div>
                        <div class="--span_two_columns">
                            <?php 
                            if(isset($_GET['update'])) {
                                echo "<p id='account-success-message'>Your profile was updated successfully!</p>";
                            } else if(isset($_GET['invalid'])) {
                                if($_GET['invalid'] == 'email') {
                                    echo "<p id='account-error-message'>The email address you entered is already registered.</p>";
                                } else if($_GET['invalid'] == 'phone') {
                                    echo "<p id='account-error-message'>The phone number you entered is already registered.</p>";                                    
                                }
                            }
                            ?>
                        </div>
                        <div class="--span_two_columns">
                            <button>UPDATE</button>
                            <button type="reset" value="Reset">CANCEL</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
        <script src="../js/components/footer.js"></script>
        <script src="../js/functions/profile-append-name.js"></script>
    </body>
    </html>