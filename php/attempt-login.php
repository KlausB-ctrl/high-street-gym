<?php
include "../model/connect.php";

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

// Define login values as variables
$user_email = test_input($_POST['email']);
$user_password = $_POST['password'];

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if email exists
    $login_sql = "SELECT * FROM user WHERE user_email_address = '$user_email'";
    $login_statement = $conn->prepare($login_sql);
    $login_statement->execute();
    $login_result = $login_statement->fetchAll();
    $login_statement->closeCursor();

    if(isset($login_result[0])) {
        // Check if password is correct
        if(password_verify($user_password, $login_result[0]['user_password'])) {
            // Password is correct, begin session
            session_start();
            $_SESSION['valid'] = true;
            $_SESSION['timeout'] = time();
            $_SESSION['id'] = $login_result[0]['user_id'];
            $_SESSION['first-name'] = $login_result[0]['user_first_name'];
            $_SESSION['last-name'] = $login_result[0]['user_last_name'];
            header("Location: ../index.html");
            exit();
        } else {
            // Password is incorrect, return user to login page
            header("Location: ../pages/login.php?invalid=password");
            exit();
        }
    } else {
        // Email does not exist, return user to login page
        header("Location: ../pages/login.php?invalid=email");
        exit();
    }
}

?>