<?php
include('connect.php');
if ($_POST['submit'] != NULL) {
    $name = $_POST['name'];
    $fare = $_POST['fare'];
    $seattype = $_POST['seattype'];
    $drivername = $_POST['drivername'];
    $drivernumber = $_POST['drivernumber'];

    if (mysqli_query($con, "INSERT INTO car VALUES (NULL,'$name',NULL,NULL,'$fare','$seattype','$drivername','$drivernumber')")) {
        header("location:http://localhost/internship_project3_TMS/viewadmin.php");
    } else {
        echo "ERROR";
    }
}
