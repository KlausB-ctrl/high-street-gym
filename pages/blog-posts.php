<?php 
include "../model/connect.php";
session_start();

if(!isset($_SESSION['id'])) {
    header("Location: ../pages/login.php");
    exit();
}

// Create relevant variables
$user_id = $_SESSION['id'];
$first_name = $_SESSION['first-name'];
$last_name = $_SESSION['last-name'];

//Fetch author details
$blog_sql = "SELECT * FROM blog_post WHERE user_user_id = $user_id";
$blog_statement = $conn->prepare($blog_sql);
$blog_statement->execute();
$blog_result = $blog_statement->fetchAll();
$blog_statement->closeCursor();

?>

<!DOCTYPE html>
    <html lang="en-gb">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Blog Posts | Profile | High Street Gym</title>
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    <body>
        <script src="../js/components/header.js"></script>
        <main class="gray_background --flexcentre-column">
            <div class="blue_background"></div>
            <h1>Profile</h1>
            <div class="white_background --flexcentre">
                <script src="../js/components/profile-navigation.js"></script>
                <div class="profile_content--blog">
                    <h2>My Blog Posts</h2>
                    <div class="profile_content_blog_posts">
                        <?php
                        if(empty($blog_result)) {
                            echo "<p>Sorry, there appears to be nothing available here.</p>";
                        } else {
                            foreach($blog_result as $blog):
                                // Create relevant variables
                                $blog_id = $blog['blog_post_id'];
                                $blog_title = $blog['blog_title'];

                                // Create the HTML
                                echo
                                "
                                <div class='profile_content_blog_preview'>
                                    <div class='profile_content_blog_preview_title --flexcentre'>
                                        <a>" . $blog_title . "</a>
                                    </div>
                                    <form class='profile_content_blog_preview_buttons --flexcentre' method='post'>
                                        <button class='edit_blog_button' name='edit-blog-id' formaction='../pages/edit-blog.php' value=" . $blog_id . "></button>
                                        <button class='delete_blog_button' name='delete-blog-id' formaction='../php/delete-blog.php' value=" . $blog_id . "></button>
                                    </form>
                                </div>
                                ";
                            endforeach;
                        }
                        ?>
                    </div>
                </div>
            </div>
        </main>
        <script src="../js/components/footer.js"></script>
        <input id="first_name" hidden value=<?php echo $first_name; ?>>
        <input id="last_name" hidden value=<?php echo $last_name; ?>>
        <script src="../js/functions/profile-append-name.js"></script>
    </body>
    </html>