<?php
//============================================================================
include "connect.php";
session_start();
if(!isset($_SESSION['security'])){
    header('location:logout.php');
}
$ID=$_GET['q'];
$time=date("Y-m-d h:i:sa");
$query="UPDATE `perpermissions_details` SET `arrival_time`='$time'  WHERE `ID`= '$ID'";
$sql=mysqli_query($connect,$query);
if ($sql) {
    // echo '<script>alert("Request Accepted")</script>';
	echo "<script>window.location='./security.php';</script>";
}
else{
    // echo '<script>alert("Failed Try Again")</script>';
	// echo "<script>window.location='./requests.php';</script>";
}
//============================================================================
?>