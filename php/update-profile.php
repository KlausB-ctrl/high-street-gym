<?php
include "../model/connect.php";
session_start();

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

if(!isset($_SESSION['id'])) {
    header("Location: ../pages/login.php");
    exit();
}

// Define update values as variables
$user_id = $_SESSION['id'];
$user_first_name = $_POST['first_name'];
$user_last_name = $_POST['last_name'];
$user_email_address = test_input($_POST['email']);
$user_phone_number = $_POST['phone'];
$user_bio = test_input($_POST['bio']);

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if email exists
    $check_email_sql = "SELECT user_id FROM user WHERE user_email_address = '$user_email_address'";
    $check_email_statement = $conn->prepare($check_email_sql);
    $check_email_statement->execute();
    $check_email_result = $check_email_statement->fetchAll();
    $check_email_statement->closeCursor();

    if(isset($check_email_result[0])) {
        if($check_email_result[0]['user_id'] !== $user_id) {
            // Email is already in use, redirect user back to update page with error
            header("Location: ../pages/account-details.php?invalid=email");
            exit();
        }
    }

    // Check if phone number exists
    $check_phone_sql = "SELECT user_id FROM user WHERE user_phone_number = '$user_phone_number'";
    $check_phone_statement = $conn->prepare($check_phone_sql);
    $check_phone_statement->execute();
    $check_phone_result = $check_phone_statement->fetchAll();
    $check_phone_statement->closeCursor();

    if(isset($check_phone_result[0])) {
        if($check_phone_result[0]['user_id'] !== $user_id) {
            // Phone is already in use, redirect user back to update page with error
            header("Location: ../pages/account-details.php?invalid=phone");
            exit();
        }
    }

    // Update user's details
    $update_sql =   
        "UPDATE user SET 
            user_first_name = '$user_first_name', 
            user_last_name = '$user_last_name', 
            user_email_address = '$user_email_address',
            user_phone_number = '$user_phone_number',
            user_bio = '$user_bio'
        WHERE user_id = $user_id";
    $update_statement = $conn->prepare($update_sql);
    $update_statement->execute();

    header("Location: ../pages/account-details.php?update=success");
}

?>