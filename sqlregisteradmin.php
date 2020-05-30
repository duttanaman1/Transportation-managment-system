<?php
require('connect.php');
session_start();
if ($_POST['submit'] != NULL) {
    $name = $_POST['name'];
    $password = $_POST['password'];
    if (mysqli_query($con, "INSERT INTO admin_tbl VALUES (NULL,'$name','$password'); ")) {
        header("Location:http://localhost/internship_project3_TMS/viewsuperadmin.php");
    } else {
        echo "Error";
    }
}
