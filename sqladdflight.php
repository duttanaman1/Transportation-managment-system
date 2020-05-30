<?php
include('connect.php');
if ($_POST['submit'] != NULL) {
    $name = $_POST['name'];
    $fare = $_POST['fare'];
    $type = $_POST['type'];
    $drivername = $_POST['drivername'];
    $drivernumber = $_POST['drivernumber'];

    if (mysqli_query($con, "INSERT INTO flight VALUES (NULL,'$name','$type','$fare','$drivername','$drivernumber')")) {
        header("location:http://localhost/internship_project3_TMS/viewadmin.php");
    } else {
        echo "ERROR";
    }
}
