<?php
include "connect.php";
session_start();

if (!isset($_SESSION['student'])) {
    header('location: logout.php');
    exit;
}

$username = $_SESSION['student'];
$oldpassword = $_POST['oldpassword'];
$newpassword = $_POST['newpassword'];
$confirmpassword = $_POST['confirmpassword'];

$query = "SELECT * FROM `login` WHERE `username`='$username'";
$sql = mysqli_query($connect, $query);
$row = mysqli_fetch_array($sql);

if ($row['password'] == $oldpassword) {
    if ($newpassword == $confirmpassword) {
        $query = "UPDATE `login` SET `password`='$newpassword' WHERE `username`='$username'";
        $sql = mysqli_query($connect, $query);
        
        if ($sql) {
            // Password updated successfully
            echo "<script>alert('Password Updated (Login again)');</script>";
            echo "<script>window.location='logout.php';</script>";
            exit; // Stop script execution after redirect
        } else {
            // Password update failed
            echo "<script>alert('Password Cannot be Updated')</script>";
            echo "<script>window.location='changepassword.php';</script>";
            exit; // Stop script execution after redirect
        }
    } else {
        // New and Confirm Password mismatch
        echo "<script>alert('New and Confirm Password should be the same')</script>";
        echo "<script>window.location='changepassword.php';</script>";
        exit; // Stop script execution after redirect
    }
} else {
    // Old password doesn't match
    echo "<script>alert('Old Password is incorrect')</script>";
    echo "<script>window.location='changepassword.php';</script>";
    exit; // Stop script execution after redirect
}
?>
