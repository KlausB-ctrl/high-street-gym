<?php
include '../model/connect.php';

$xml = simplexml_load_file("../xml/trainer-input.xml");
$current_trainer = 0;

foreach($xml->children() as $row) {
    $current_trainer++;

    $first_name = $row->first_name;
    $last_name = $row->last_name;
    $email_address = $row->email_address;
    $phone_number = strval($row->phone_number);

    // Check if all values are present
    if(($first_name == "") || ($last_name == "") || ($email_address == "") || ($phone_number == "")) {
        header("Location: ../pages/trainer-input.php?operation=missing&cause=" . $current_trainer);
        exit();
    }

    // Check if phone number only contains numbers
    if(!ctype_digit($phone_number)) {
        header("Location: ../pages/trainer-input.php?operation=invalid&cause=" . $phone_number);
        exit();
    }

    // Check if phone number is <=30 characters
    if(strlen($phone_number) > 30) {
        header("Location: ../pages/trainer-input.php?operation=exceedslength&cause=" . $phone_number);
        exit(); 
    }

    // Check if email is already in use
    $check_email_sql = "SELECT * FROM trainer WHERE trainer_email_address = '$email_address'";
    $check_email_statement = $conn->prepare($check_email_sql);
    $check_email_statement->execute();
    $check_email_result = $check_email_statement->fetchAll();
    $check_email_statement->closeCursor();

    if(!empty($check_email_result)) {
        header("Location: ../pages/trainer-input.php?operation=duplicate&cause=" . $email_address);
        exit();
    }

    // Check if phone is already in use
    $check_phone_sql = "SELECT * FROM trainer WHERE trainer_phone_number = '$phone_number'";
    $check_phone_statement = $conn->prepare($check_phone_sql);
    $check_phone_statement->execute();
    $check_phone_result = $check_phone_statement->fetchAll();
    $check_phone_statement->closeCursor();

    if(!empty($check_phone_result)) {
        header("Location: ../pages/trainer-input.php?operation=duplicate&cause=" . $phone_number);
        exit();
    }


    $insert_trainer_sql = "INSERT INTO trainer(trainer_first_name, trainer_last_name, trainer_email_address, trainer_phone_number) VALUES ('$first_name', '$last_name', '$email_address', '$phone_number')";
    $insert_trainer_statement = $conn->prepare($insert_trainer_sql);
    $insert_trainer_statement->execute();
}

header("Location: ../pages/trainer-input.php?operation=success");