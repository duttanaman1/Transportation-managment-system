<?php
require('../connect.php');
if ($_POST['submit']) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $POST['message'];
    mysqli_query($con, "INSERT INTO feedback VALUES( $name,'$email',$subject,'$message'); ");
}
header("location:about-us.php");
