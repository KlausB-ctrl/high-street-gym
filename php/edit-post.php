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

// Define update values as variables
$blog_post_id = $_POST['edit-blog-id'];
$blog_title = test_input($_POST['blog-title']);
$blog_content = test_input($_POST['blog-content']);

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Update blog details
    $blog_sql =   
        "UPDATE blog_post SET 
            blog_title = '$blog_title', 
            blog_content = '$blog_content'
        WHERE blog_post_id = $blog_post_id";
    $blog_statement = $conn->prepare($blog_sql);
    $blog_statement->execute();

    header("Location: ../pages/blog-post.php?postid=" . $blog_post_id);
}

?>