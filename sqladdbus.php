<?php
include('connect.php');
echo 1;
if ($_POST['submit'] != NULL) {
    echo 2;
    $name = $_POST['name'];
    $fare = $_POST['fare'];
    $type = $_POST['type'];
    $drivername = $_POST['drivername'];
    $drivernumber = $_POST['drivernumber'];

    if (mysqli_query($con, "INSERT INTO bus VALUES (NULL,'$name',NULL,NULL,'$fare','$type','$drivername','$drivernumber')")) {
        header("location:http://localhost/internship_project3_TMS/viewadmin.php");
    } else {
        echo "ERROR";
    }
}
