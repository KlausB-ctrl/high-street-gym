<?php 
include "../model/connect.php";
session_start();

if(!isset($_SESSION['id'])) {
    header("Location: ../pages/login.php");
    exit();
}

?>

<!DOCTYPE html>
    <html lang="en-gb">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create Post | Blog | High Street Gym</title>
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    <body>
        <script src="../js/components/header.js"></script>
        <main>
            <div id="create_post_background" class="home_banner">
                <section class="create_post_container">
                    <h1>CREATE BLOG POST</h1>
                    <form action="../php/create-post.php" method="post">
                        <label for="blog-title">Title:</label>
                        <input id="blog-title" name="blog-title" type="text" minlength="3" maxlength="150" required>
                        <label for="blog-content">Content:</label>
                        <div> 
                            <textarea id="blog-content" name="blog-content" minlength="50" maxlength="2500" required></textarea>
                        </div>
                        <button class="standard_button">CREATE POST</button>
                    </form>
                </section>
            </div>
        </main>
        <script src="../js/components/footer.js"></script>
        <script src="../js/functions/reveal-booking-details.js"></script>
    </body>
    </html>