<?php
include "../model/connect.php";

session_start();

if(!isset($_SESSION['id'])) {
    header("Location: ../pages/login.php");
    exit();
}

// Define all relevant values as variables
$user_id = $_SESSION['id'];
$password_match = ($_POST['new-password'] == $_POST['re-entered_password']);
$user_password = password_hash($_POST['new-password'], PASSWORD_BCRYPT);
$user_confirm_password = password_hash($_POST['re-entered_password'], PASSWORD_BCRYPT);

if(!$password_match) {
    header("Location: ../pages/password.php?invalid=passwordmatch");
    exit();
}

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Change password
    $change_password_sql = "UPDATE user SET user_password = '$user_password' WHERE user_id = $user_id";
    $change_password_statement = $conn->prepare($change_password_sql);
    $change_password_statement->execute();

    header("Location: ../pages/password.php?update=success");
}
?>