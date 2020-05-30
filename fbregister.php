<?php
require("connect.php");
$cust_name = $_COOKIE["cust_name"];
$_SESSION['name'] = $cust_name;
echo $cust_name;

include("header.php");
?>
<div class="container">
    <form action="sqlregister.php" method="POST" class="w-50">
        <input type="hidden" name="name" value="<?php echo $cust_name; ?>">
        Set Password:</br>
        <input type="text" name="password" class="form-control">
        Aadhar: <br>
        <input type="text" name="identity" class="form-control"> <br>
        Image:<br>
        <input type="file" name="image"> <br>
        <br> <br>
        <input type="submit" value="Complete Registration" name="submit" class="btn btn-info">
    </form>
</div>