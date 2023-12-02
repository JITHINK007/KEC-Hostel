<?php
//============================================================================
include "connect.php";
session_start();
if(!isset($_SESSION['student'])){
    header('location:logout.php');
}
$rollnumber=$_SESSION['student'];
//============================================================================
$permissiontime=$_POST['permissiontime'];
$reason=$_POST['reason'];
$roomnumber=$_POST['room_number'];
$contacnumber=$_POST['contacnumber'];
//============================================================================
$insert="INSERT INTO `sick_details`(`rollnumber`, `permissiontime`, `reason`, `contactnumber`, `roomnumber`) VALUES 
('$rollnumber','$permissiontime','$reason','$contacnumber','$roomnumber')";
$sql=mysqli_query($connect,$insert);
//============================================================================

if($sql) {
    echo '<script>alert("Sick Permission Request Successfully Submited")</script>';
	echo "<script>window.location='./history.php';</script>";
}else{
    echo '<script>alert("Sick Permission Request  is Faild")</script>';
	echo "<script>window.location='./sickform.php';</script>";
}

?>