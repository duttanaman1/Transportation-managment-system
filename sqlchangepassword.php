<?php
require("connect.php");
if ($_POST['submit'] != NULL) {
    $password = $_POST['password'];
    $newpassword = $_POST['newpassword'];
    if (mysqli_query($con, "UPDATE customer SET password='$newpassword' WHERE password='$password' ")) {
        header("Location: http://localhost/internship_project3_TMS/viewcustomer.php");
    } else if (mysqli_query($con, "UPDATE employee SET password='$newpassword' WHERE password='$password' ")) {
        header("Location: http://localhost/internship_project3_TMS/viewemployee.php");
    } else  if (mysqli_query($con, "UPDATE admin_tbl SET password='$newpassword' WHERE password='$password'  ")) {
        header("Location: http://localhost/internship_project3_TMS/viewadmin.php");
    } else {
        echo "error";
    }
}
