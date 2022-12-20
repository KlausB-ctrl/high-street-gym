<?php
include '../model/connect.php';

$delete_bookings_sql = "DELETE FROM class_booking";
$delete_bookings_statement = $conn->prepare($delete_bookings_sql);
$delete_bookings_statement->execute();

$delete_classes_sql = "DELETE FROM class";
$delete_classes_statement = $conn->prepare($delete_classes_sql);
$delete_classes_statement->execute();

header("Location: ../pages/class-input.php?delete=success");
exit();
?>