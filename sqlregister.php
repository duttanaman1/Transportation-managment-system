<?php
require('connect.php');
$path_filename_ext1 = "";
if ($_POST['submit'] != NULL) {
    if (($_FILES['image']['name'] != "")) {

        $target_dir = "img/";
        $file = $_FILES['image']['name'];
        $path = pathinfo($file);
        $filename = $path['filename'];
        $ext = $path['extension'];
        $temp_name = $_FILES['image']['tmp_name'];
        $path_filename_ext1 = $target_dir . $filename . "." . $ext;


        if (file_exists($path_filename_ext1)) {
            echo "Sorry, file already exists.   ";
        } else {
            move_uploaded_file($temp_name, $path_filename_ext1);
        }
    }
    $name = $_POST['name'];
    $password = $_POST['password'];
    $identity = $_POST['identity'];
    $image = "http://localhost/internship_project3_TMS/img/" . $path_filename_ext1;
    echo 1;
    $_SESSION['name'] = $name;
    if (mysqli_query($con, "INSERT INTO customer VALUES (NULL,'$name','$password',NULL,'$image','$identity',NULL,NULL,NULL)")) {
        $_SESSION['name'] = $name;
        echo  $_SESSION['name'];
        header("Location: http://localhost/internship_project3_TMS/viewcustomer.php");
    } else {
        echo "Error";
    }
}
