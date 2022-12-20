<?php
include "../model/connect.php";

session_start();

if(!isset($_SESSION['id'])) {
    header("Location: ../pages/login.php");
    exit();
}

// Data sanitisation function
function test_input($data) {
    // Remove whitespaces in the string
    $data = trim($data);

    // Remove any slashes in the string
    $data = stripslashes($data);
    
    // Convert any special characters in the string
    $data = htmlspecialchars($data);

    // Return the string
    return $data;
}

// Define all relevant variables
$user_id = $_SESSION['id'];
$blog_title = test_input($_POST['blog-title']);
$blog_content = test_input($_POST['blog-content']);

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Add blog post
    $blog_sql = "INSERT INTO blog_post (blog_title, blog_content, user_user_id)
    VALUES ('$blog_title', '$blog_content', $user_id)";
    $blog_statement = $conn->prepare($blog_sql);
    $blog_statement->execute();
    

    // Redirect user back to the blog list
    header("Location: ../pages/blog.php");
}
?>