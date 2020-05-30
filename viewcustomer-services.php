<?php
include("header.php");
require("connect.php");
$usr = $_SESSION['name'];

?>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark ">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="viewcustomer.php">Book</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="viewcustomer-history.php">Travel History</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="viewcustomer-services.php">Services</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="viewcustomer-payment.php">Payment</a>
        </li>
    </ul>
</nav>
<div class="container m-3">
    <div class="cardw-75">
        <div class="card-header" style="background-color: #A21B00; color:bisque; text-align:center;font-size:1.2em;">
            <h2>Select Services</h2>
        </div>

        <div class="card-body ">
            <form action="sqlservice.php" method="POST">
                <select name="bookid" id="" class="form-control">
                    <option selected>Select Transport options</option>
                    <?php

                    $sql = mysqli_query($con, "SELECT * FROM book where cust_name='$usr'");
                    if (mysqli_num_rows($sql)) {
                        while ($book = mysqli_fetch_assoc($sql)) {
                    ?>
                            <option value="<?php echo $book['bookid']; ?>"><?php echo "Book ID:" . $book['bookid'] . " Transport: " . $book['trans_id'] . " " . $book['trans_name'] ?></option>
                    <?php
                        }
                    } ?>
                </select>
                <br>
                <br>
                <br>
                <label>
                    <h3>Add Services</h3>
                </label><br>
                <input type="checkbox" name="service1" value="10" class="my-2" /> Service 1 price 10</br>
                <input type="checkbox" name="service2" value="20" class="my-2" /> Service 2 price 20</br>
                <input type="checkbox" name="service3" value="30" class="my-2" /> Service 3 price 30</br>
                <input type="hidden" name="cust_name" value="<?php echo $usr; ?>">
                <br>
                <input type="submit" name="submit" value="Add Service" class="btn btn-success" />
            </form>
        </div>
    </div>
</div>