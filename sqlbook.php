<?php
include("connect.php");

if ($_POST['submit'] != null) {
    $cust_id = $_POST['cust_id'];
    $cust_name = $_POST['cust_name'];
    $trans_id = $_POST['trans_id'];
    $trans_name = $_POST['trans_name'];
    $trans_fare = $_POST['trans_fare'];
    $date = $_POST['date'];
    $cust = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM customer where cust_id=$cust_id"));
    $tot = $cust['fare'] + $trans_fare;
    if (mysqli_query($con, "INSERT INTO book VALUES (NULL,'$cust_id','$cust_name','$trans_id','$trans_name','$trans_fare','$date',null)")) {
        if (mysqli_query($con, "UPDATE customer SET fare='$tot' WHERE  cust_id=$cust_id ")) {

            header("location:http://localhost/internship_project3_TMS/viewcustomer-services.php");
        } else {
            echo "ERROR1";
        }
    } else {
        echo "ERROR2";
    }
}
