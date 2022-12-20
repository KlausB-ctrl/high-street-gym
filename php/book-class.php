<?php
include '../model/connect.php';

session_start();

if(!isset($_SESSION['id'])) {
    header("Location: ../pages/login.php");
    exit();
}

// Define relevant variables
$user_id = $_SESSION['id'];
$class_class_id = $_POST['class-id'];

$book_class_sql = "INSERT INTO class_booking (class_class_id, user_user_id) VALUES ($class_class_id, $user_id)";
$book_class_statement = $conn->prepare($book_class_sql);
$book_class_statement->execute();

header("Location: ../pages/book.php");
?>