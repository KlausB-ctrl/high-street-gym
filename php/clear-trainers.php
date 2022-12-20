<?php
include '../model/connect.php';

$check_classes_sql = "SELECT * FROM class";
$check_classes_statement = $conn->prepare($check_classes_sql);
$check_classes_statement->execute();
$check_classes_result = $check_classes_statement->fetchAll();
$check_classes_statement->closeCursor();

if(!$check_classes_result) {
    $delete_trainers_sql = "DELETE FROM trainer";
    $delete_trainers_statement = $conn->prepare($delete_trainers_sql);
    $delete_trainers_statement->execute();
    
    header("Location: ../pages/trainer-input.php?delete=success");
    exit();
}

header("Location: ../pages/trainer-input.php?delete=failed");
exit();

?>