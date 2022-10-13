<?php

ob_start();
$id = $_GET['id'];

require_once("./config.php");
$sqlDeleteDistrict = "DELETE FROM districts WHERE id = '$id'";
$statement = $conn->prepare($sqlDeleteDistrict);
$results = $statement->execute();

if($results) {
    $_SESSION['message'] = "Deleted Successfully!!";
    $_SESSION['alert'] = "alert alert-success";
    header("location: view-districts.php");
    ob_end_flush();
} else {
    $_SESSION['message'] = "OOOOPSS Something Went Wrong";
    $_SESSION['alert'] = "alert alert-danger";
}

;?>