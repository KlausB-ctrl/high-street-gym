<?php
include "../model/connect.php";

// Define all registration values as variables
$user_first_name = $_POST['first-name'];
$user_last_name = $_POST['last-name'];
$user_email_address = $_POST['email'];
$user_phone_number = str_replace(" ", "", $_POST['phone']);
$password_match = ($_POST['password'] == $_POST['re-enter-password']);
$user_password = password_hash($_POST['password'], PASSWORD_BCRYPT);
$user_confirm_password = password_hash($_POST['re-enter-password'], PASSWORD_BCRYPT);

if(!$password_match) {
    header("Location: ../pages/register.php?invalid=passwordmatch");
    exit();
}

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Check if the user entered a phone number
    if($user_phone_number) {
        // Check if the entered phone number is already in use
        $check_phone_sql = "SELECT user_id FROM user WHERE user_phone_number = $user_phone_number";
        $check_phone_statement = $conn->prepare($check_phone_sql);
        $check_phone_statement->execute();
        $check_phone_result = $check_phone_statement->fetchAll();
        $check_phone_statement->closeCursor();
        
        if($check_phone_result) {
            // Alert the user that the entered phone numnber is already in use
            header("Location: ../pages/register.php?invalid=phone");
            exit();
        }
    } 

    // Check if the entered email address is in use
    $check_email_sql = "SELECT user_id FROM user WHERE user_email_address = '$user_email_address'";
    $check_email_statement = $conn->prepare($check_email_sql);
    $check_email_statement->execute();
    $check_email_result = $check_email_statement->fetchAll();
    $check_email_statement->closeCursor();

    if($check_email_result) {
        header("Location: ../pages/register.php?invalid=email");
        exit();
    }

    // Register user
    $register_sql = "INSERT INTO user (user_first_name, user_last_name, user_email_address, user_phone_number, user_password)
    VALUES ('$user_first_name', '$user_last_name', '$user_email_address', '$user_phone_number', '$user_password')";
    $register_statement = $conn->prepare($register_sql);
    $register_statement->execute();

    // Log User In
    $login_sql = "SELECT user_id FROM user WHERE user_email_address = '$user_email_address'";
    $login_statement = $conn->prepare($login_sql);
    $login_statement->execute();
    $login_result = $login_statement->fetchAll();
    $login_statement->closeCursor();

    session_start();
    $_SESSION['valid'] = true;
    $_SESSION['timeout'] = time();
    $_SESSION['id'] = $login_result[0]['user_id'];
    $_SESSION['first-name'] = $login_result[0]['user_first_name'];
    $_SESSION['last-name'] = $login_result[0]['user_last_name'];

    // Redirect user back to home
    header("Location: ../index.html");
}
?>