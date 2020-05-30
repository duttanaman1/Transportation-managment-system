<?php
include('connect.php');
if ($_POST['submit'] != null) {
    $empname = $_POST['empname'];
    $pass = $_POST['password'];
    if (mysqli_query($con, "INSERT INTO employee values(NULL,'$empname','$pass')")) {
        header("location:http://localhost/internship_project3_TMS/viewadmin-add.php");
    } else {
        echo "ERROR";
    }
}
