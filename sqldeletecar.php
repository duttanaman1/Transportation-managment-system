<?php
require('connect.php');
if ($_POST['submit'] != null) {
    $id = $_POST['id'];
    if (mysqli_query($con, "DELETE FROM car WHERE carid = $id")) {
        header("location:http://localhost/internship_project3_TMS/viewadmin.php");
    } else {
        echo "Error";
    }
}
