<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('location:logout.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fileInfo = pathinfo($_FILES['excelfile']['name']);
    $extension = strtolower($fileInfo['extension']);
    if (in_array($extension, ['xls', 'xlsx'])) {
        $excelFile = $_FILES['excelfile']['tmp_name'];
        processExcelFile($excelFile, $extension);
    } else {
        echo '<script>alert("Unsupported file format. Please upload a valid Excel file'.$extension.'")</script>';
        echo "<script>window.location='./xmlstudentdata.php';</script>";
    }
}

function processExcelFile($excelFile, $extension) {
    require 'vendor/autoload.php'; // Include PhpSpreadsheet autoload file

    $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($excelFile);
    $worksheet = $spreadsheet->getActiveSheet();
    $data = [];

    foreach ($worksheet->getRowIterator() as $row) {
        $rowData = [];
        foreach ($row->getCellIterator() as $cell) {
            $rowData[] = $cell->getValue();
        }
        $data[] = $rowData;
    }

    // Insert data into the database
    insertDataIntoDatabase($data);

    echo '<script>alert("Data successfully inserted into the database.")</script>';
    echo "<script>window.location='./xmlstudentdata.php';</script>";
}

function insertDataIntoDatabase($data) {
    include "connect.php";

    foreach ($data as $row) {
        // Adjust the following code based on your database table structure
        $studentname = mysqli_real_escape_string($connect, $row[0]);
        $rollnumber = mysqli_real_escape_string($connect, $row[1]);
        $dateofbirth = mysqli_real_escape_string($connect, $row[2]);
        $stream = mysqli_real_escape_string($connect, $row[3]);
        $branch = mysqli_real_escape_string($connect, $row[4]);
        $father_guardianname = mysqli_real_escape_string($connect, $row[5]);
        $father_guardiannumber = mysqli_real_escape_string($connect, $row[6]);
        $roomnumber = mysqli_real_escape_string($connect, $row[7]);
        $address = mysqli_real_escape_string($connect, $row[8]);
        $logintype="student";

        $query = "INSERT INTO `student_details` (`studentname`, `rollnumber`, `dateofbirth`, `stream`, `branch`, `father/guardianname`, `father/guardiannumber`, `roomnumber`, `address`) 
                  VALUES ('$studentname', '$rollnumber', '$dateofbirth', '$stream', '$branch', '$father_guardianname', '$father_guardiannumber', '$roomnumber', '$address')";

        mysqli_query($connect, $query);

        $loginquery="INSERT INTO `login`(`username`, `password`, `logintype`) VALUES ('$rollnumber','$rollnumber','$logintype')";
        $loginsql=mysqli_query($connect,$loginquery);

        if($query){
            echo '<script>alert("Registed Successfully")</script>';
            echo "<script>window.location='./xmlstudentdata.php';</script>";
        }
        else{
            echo '<script>alert("Registration Faild try again")</script>';
	        echo "<script>window.location='./xmlstudentdata.php';</script>";
        }
    }

    mysqli_close($connect);
}
?>
