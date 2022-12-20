<?php 
include "../model/connect.php";
session_start();


// Fetch all blog posts
$blog_sql = "SELECT * FROM blog_post";
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
        <title>Blog | High Street Gym</title>
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    <body>
        <script src="../js/components/header.js"></script>
        <main class="blog_container">
            <h1>HIGH STREET GYM - MEMBER'S BLOG</h1>
            <div class="blog_columns">
                <div class="blog_list">
                    <?php
                    if(empty($blog_result)) {
                        echo "<p>Sorry, there appears to be nothing available here.</p>";
                    } else {
                        foreach($blog_result as $blog):
                            // Retrieve user information
                            $user_id = $blog['user_user_id'];
                            $user_sql = "SELECT * FROM user WHERE user_id = $user_id";
                            $user_statement = $conn->prepare($user_sql);
                            $user_statement->execute();
                            $user_result = $user_statement->fetchAll();
                            $user_statement->closeCursor();

                            // Create user variables
                            $user_first_name = $user_result[0]['user_first_name'];
                            $user_last_name = $user_result[0]['user_last_name'];

                            // Create relevant variables
                            $blog_id = $blog['blog_post_id'];
                            $blog_title = $blog['blog_title'];
                            $blog_content_preview = substr($blog['blog_content'], 0, 400);

                            // Create the HTML
                            echo
                            "
                            <section class='blog_preview'>
                                <div class='blog_preview_avatar'>
                                    <img src='../images/icons/profile-icon.png' alt='The profile photo of the blog author.'>
                                    <p>" . $user_first_name . " " . $user_last_name . "</p>
                                </div>
                                <div class='blog_preview_text'>
                                    <h2>" . $blog_title . "</h2>
                                    <p>" . $blog_content_preview . "... <a href='./blog-post.php?postid=" . $blog_id . "'>Read More</a>
                                    </p>
                                </div>
                            </section>
                            ";
                            
                        endforeach;
                    }
                    ?>
                    
                </div>
                <div class="blog_create_button">
                    <button class="standard_button" onclick="window.location.href='create-post.php'">CREATE POST</button>
                </div>
            </div>
        </main>
        <script src="../js/components/footer.js"></script>
    </body>
    </html>