<?php
include '../model/connect.php';

session_start();

if(!isset($_SESSION['id'])) {
    header("Location: ../pages/login.php");
    exit();
}

// Define relevant variables
$blog_post_id = $_POST['delete-blog-id'];

$delete_blog_sql = "DELETE FROM blog_post WHERE blog_post_id = $blog_post_id";
$delete_blog_statement = $conn->prepare($delete_blog_sql);
$delete_blog_statement->execute();

header("Location: ../pages/blog-posts.php");
?>