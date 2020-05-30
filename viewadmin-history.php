<?php
include("header.php");
include("connect.php");
if ($_SESSION['name'] != "") {
    $usr = $_SESSION['name'];

?>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark ">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="viewadmin.php">Transport List</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="viewadmin-transport.php">Add transport</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="viewadmin-history.php">Customer Travel History</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="viewadmin-add.php">Add Employee</a>
            </li>

        </ul>
    </nav>
    <div class="container m-3">
        <div class="card">
            <div class="card-header" style="background-color: #A21B00; color:bisque; text-align:center;font-size:1.2em;"> Travel History</div>

            <div class="card-body w-75">

                <div class="list-group">
                    <?php
                    $sql = mysqli_query($con, "SELECT * FROM book ");
                    if (mysqli_num_rows($sql)) {
                        while ($book = mysqli_fetch_assoc($sql)) {

                    ?>
                            <a href="#" class="list-group-item list-group-item-action ">
                                <div class="d-flex w-100 justify-content-between">
                                    <h1 class="mb-1"><?php echo $book['trans_id'] . " " . $book['trans_name']; ?></h1>
                                    <h3>RS <?php echo $book['trans_fare']; ?></h3>
                                </div>
                                <p class="mb-1">
                                    The transportation is booked by the
                                    <br>Name: <strong><?php echo $book['cust_name']; ?></strong>
                                    <br>date: <strong><?php echo $book['date']; ?></strong>
                                </p>
                            </a>

                    <?php

                        }
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>

<?php } ?>