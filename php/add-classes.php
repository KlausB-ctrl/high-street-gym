<?php
include '../model/connect.php';

$xml = simplexml_load_file("../xml/class-input.xml");
$current_class = 0;

foreach($xml->children() as $row) {
    $current_class++;

    $name = $row->name;
    $date = $row->date;
    $start_time = $row->start_time;
    $finish_time = $row->finish_time;
    $trainer_email = $row->trainer_email;

    // Get trainer ID
    $check_trainer_sql = "SELECT * FROM trainer WHERE trainer_email_address = '$trainer_email'";
    $check_trainer_statement = $conn->prepare($check_trainer_sql);
    $check_trainer_statement->execute();
    $check_trainer_result = $check_trainer_statement->fetchAll();
    $check_trainer_statement->closeCursor();

    if(empty($check_trainer_result)) {
        header("Location: ../pages/class-input.php?operation=incorrect&cause=" . $trainer_email);
        exit();
    }

    $trainer_id = $check_trainer_result[0]['trainer_id'];

    // Check if all values are present
    if(($name == "") || ($date == "") || ($start_time == "") || ($finish_time == "") || ($trainer_email = "")) {
        header("Location: ../pages/class-input.php?operation=missing&cause=" . $current_class);
        exit();
    }

    if(!strtotime($date)) {
        header("Location: ../pages/class-input.php?operation=invalid&cause=" . $current_class);
        exit();
    }

    $delete_bookings_sql = "DELETE FROM class_booking";
    $delete_bookings_statement = $conn->prepare($delete_bookings_sql);
    $delete_bookings_statement->execute();

    $insert_class_sql = "INSERT INTO class(class_name, class_date, class_start_time, class_finish_time, trainer_trainer_id) VALUES ('$name', '$date', '$start_time', '$finish_time', $trainer_id)";
    $insert_class_statement = $conn->prepare($insert_class_sql);
    $insert_class_statement->execute();
}

header("Location: ../pages/class-input.php?operation=success");