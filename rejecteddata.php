<?php
//============================================================================
include "connect.php";
session_start();
if(!isset($_SESSION['admin'])){
    header('location:logout.php');
}   
$ID=$_SESSION['id'];
$name=$_SESSION['admin'];
$reason=$_POST['rejectreason'];
$query="UPDATE `perpermissions_details` SET `status`='$reason', `accepted by`='$name'  WHERE `ID`= '$ID'";
$sql=mysqli_query($connect,$query);
if ($sql) {
    echo '<script>alert("Request Rejected")</script>';
	echo "<script>window.location='./requests.php';</script>";
}
else{
    echo '<script>alert("Failed Try Again")</script>';
	echo "<script>window.location='./requests.php';</script>";
}
//============================================================================
?>