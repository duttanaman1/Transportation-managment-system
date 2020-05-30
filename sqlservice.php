<?php
include('connect.php');
if ($_POST['submit'] != null) {
    $cust_name = $_POST['cust_name'];
    $bookid = $_POST['bookid'];
    $service1 = 0;
    $service2 = 0;
    $service3 = 0;
    if (isset($_POST['service1'])) {
        $service1 = 10;
    }
    if (isset($_POST['service2'])) {
        $service2 = 20;
    }
    if (isset($_POST['service3'])) {
        $service3 = 30;
    }
    $cust = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM customer where cust_name='$cust_name'"));
    $tot = $cust['fare'] + $service1 + $service2 + $service3;
    if (mysqli_query($con, "INSERT INTO service VALUES (NULL,'$bookid','$service1','$service2','$service3')")) {
        if (mysqli_query($con, "UPDATE customer SET fare='$tot' WHERE  cust_name='$cust_name' ")) {

            header("location:http://localhost/internship_project3_TMS/viewcustomer-payment.php");
        } else {
            echo "ERROR1";
        }
    } else {
        echo "ERROR2";
    }
}
