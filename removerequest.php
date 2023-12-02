<?php
//============================================================================
include "connect.php";
session_start();
if(!isset($_SESSION['student'])){
	header('location:logout.php');
}
$ID=$_GET['q'];
$query="DELETE FROM `perpermissions_details` WHERE `ID`= '$ID' AND `status`='PENDING'";
$sql=mysqli_query($connect,$query);
if ($sql) {
	echo "<script>window.location='./studentid.php';</script>";
}
else{
	echo "<script>window.location='./studentid.php';</script>";
}
//============================================================================
?>