<?php
require('connect.php');
session_start();
if ($_POST['user_login'] != NULL) {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $_SESSION['name'] = $name;



    if (mysqli_num_rows(mysqli_query($con, "SELECT * FROM customer WHERE cust_name='$name' AND password = '$password' ")) > 0) {

        header("Location: http://localhost/internship_project3_TMS/viewcustomer.php");
    } else if (mysqli_num_rows(mysqli_query($con, "SELECT * FROM employee WHERE empname='$name' AND password = '$password' ")) > 0) {

        header("Location: http://localhost/internship_project3_TMS/viewemployee.php");
    } else if (mysqli_num_rows(mysqli_query($con, "SELECT * FROM admin_tbl WHERE username='$name' AND password = '$password' ")) > 0) {

        header("Location: http://localhost/internship_project3_TMS/viewadmin.php");
    } else if ($name == "superadmin" && $password == "superadmin") {
        header("Location: http://localhost/internship_project3_TMS/viewsuperadmin.php");
    } else {
        echo "Error";
    }
}
