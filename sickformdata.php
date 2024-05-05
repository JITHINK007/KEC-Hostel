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
    // Contact number found, proceed with the sick permission request
    $permissiontime = $_POST['permissiontime'];
    $reason = $_POST['reason'];
    $roomnumber = $_POST['room_number'];
    $contacnumber = $contactRow['father/guardiannumber'];

    // Insert data into sick_details table
    $insert = "INSERT INTO `sick_details`(`rollnumber`, `permissiontime`, `reason`, `contactnumber`, `roomnumber`) VALUES 
    ('$rollnumber','$permissiontime','$reason','$contacnumber','$roomnumber')";

    $sql = mysqli_query($connect, $insert);

    if ($sql) {
        echo '<script>alert("Sick Permission Request Successfully Submitted")</script>';
        echo "<script>window.location='./history.php';</script>";
    } else {
        echo '<script>alert("Sick Permission Request Failed")</script>';
        echo "<script>window.location='./sickform.php';</script>";
    }
} else {
    // Contact number not found
    echo '<script>alert("Contact number not found")</script>';
    echo "<script>window.location='./sickform.php';</script>";
}

?>
