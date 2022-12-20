<?php 
include "../model/connect.php";
session_start();

if(!isset($_SESSION['id'])) {
    header("Location: ../pages/login.php");
    exit();
}

// Fetch blog post details
$blog_id = $_POST['edit-blog-id'];
$blog_sql = "SELECT * FROM blog_post WHERE blog_post_id = $blog_id";
$blog_statement = $conn->prepare($blog_sql);
$blog_statement->execute();
$blog_result = $blog_statement->fetchAll();
$blog_statement->closeCursor();

// Define all relevant variables
$blog_title = $blog_result[0]['blog_title'];
$blog_content = $blog_result[0]['blog_content'];
?>

<!DOCTYPE html>
    <html lang="en-gb">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Post | Blog | High Street Gym</title>
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    <body>
        <script src="../js/components/header.js"></script>
        <main>
            <div id="create_post_background" class="home_banner">
                <section class="create_post_container">
                    <h1>EDIT BLOG POST</h1>
                    <form action="../php/edit-post.php" method="post">
                        <label for="blog-title">Title:</label>
                        <input id="blog-title" name="blog-title" type="text" minlength="3" maxlength="150" required value="<?php echo $blog_title; ?>">
                        <label for="blog-content">Content:</label>
                        <div> 
                            <textarea id="blog-content" name="blog-content" minlength="50" maxlength="2500" required><?php echo $blog_content; ?></textarea>
                        </div>
                        <button class="standard_button" name="edit-blog-id" value= <?php echo $blog_id; ?>>UPDATE POST</button>
                    </form>
                </section>
            </div>
        </main>
        <script src="../js/components/footer.js"></script>
        <script src="../js/functions/reveal-booking-details.js"></script>
    </body>
    </html>