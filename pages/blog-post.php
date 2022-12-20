<?php 
include "../model/connect.php";
session_start();

// Fetch requested blog post
$blog_id = $_GET['postid'];

$blog_sql = "SELECT * FROM blog_post WHERE blog_post_id = $blog_id";
$blog_statement = $conn->prepare($blog_sql);
$blog_statement->execute();
$blog_result = $blog_statement->fetchAll();
$blog_statement->closeCursor();

// Create relevant variables
$blog_title = $blog_result[0]['blog_title'];
$blog_content = $blog_result[0]['blog_content'];

// Fetch author details
$user_id = $blog_result[0]['user_user_id'];
$user_sql = "SELECT * FROM user WHERE user_id = $user_id";
$user_statement = $conn->prepare($user_sql);
$user_statement->execute();
$user_result = $user_statement->fetchAll();
$user_statement->closeCursor();

// Create user variables
$user_first_name = $user_result[0]['user_first_name'];
$user_last_name = $user_result[0]['user_last_name'];
?>
<!DOCTYPE html>
    <html lang="en-gb">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $blog_title; ?> | Blog | High Street Gym</title>
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    <body>
        <script src="../js/components/header.js"></script>
        <main class="blog_container">
            <div class="blog_columns">
                <div class="blog_post">
                    <?php
                    echo "<h1>" . $blog_title . "</h1>";
                    echo "<p class='blog_post_content'>" . $blog_content . "</p>";
                    ?>
                </div>
                <div class="blog_create_button">
                    <div class='blog_preview_avatar --flexcentre-column'>
                        <img src='../images/icons/profile-icon.png' alt='The profile photo of the blog author.'>
                        <?php echo "<p>" . $user_first_name . " " . $user_last_name . "</p>"; ?>
                    </div>
                </div>
            </div>
        </main>
        <script src="../js/components/footer.js"></script>
    </body>
    </html>