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

$book_class_sql = "DELETE FROM class_booking WHERE class_class_id = $class_class_id AND user_user_id = $user_id";
$book_class_statement = $conn->prepare($book_class_sql);
$book_class_statement->execute();

header("Location: ../pages/bookings.php");
?>