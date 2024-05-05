<?php
// Include database connection
include "connect.php";
session_start();

if (!isset($_SESSION['student'])) {
    header('location:logout.php');
    exit;
}

$rollnumber = $_SESSION['student'];

// Fetch contact number from student_details table
$contactQuery = "SELECT `father/guardiannumber` FROM `student_details` WHERE `rollnumber`='$rollnumber'";
$contactResult = mysqli_query($connect, $contactQuery);

if ($contactResult && $contactRow = mysqli_fetch_assoc($contactResult)) {
    // Contact number found, proceed with the out pass request
    $prmissiontype = $_POST['prmissiontype'];
    $leavingdatetime = $_POST['leavingdatetime'];
    $returndatetime = $_POST['returndatetime'];
    $place = $_POST['place'];
    $reason = $_POST['reason'];
    $contacnumber = $contactRow['father/guardiannumber'];
    $status = "PENDING";
    $ID = uniqid();

    // Insert data into perpermissions_details table
    $insert = "INSERT INTO `perpermissions_details`(`ID`,`rollnumber`, `prmissiontype`, `leavingdatetime`, `returndatetime`, `place`, `reason`, `contacnumber`, `status`) VALUES 
    ('$ID','$rollnumber','$prmissiontype','$leavingdatetime','$returndatetime','$place','$reason','$contacnumber','$status')";

    $sql = mysqli_query($connect, $insert);

    if ($sql) {
        echo '<script>alert("Out Pass Request Successfully Submitted")</script>';
        echo "<script>window.location='./history.php';</script>";
    } else {
        echo '<script>alert("Out Pass Request Failed")</script>';
        echo "<script>window.location='./outform.php';</script>";
    }
} else {
    // Contact number not found
    echo '<script>alert("Contact number not found")</script>';
    echo "<script>window.location='./outform.php';</script>";
}

?>
