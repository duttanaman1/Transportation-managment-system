<?php
include("header.php");
include("connect.php");
if ($_POST['submit'] != null) {
    $cust_name = $_POST['cust_name'];
    $shipid = $_POST['id'];
    $ship = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM ship WHERE shipid='$shipid'"));
    if (!$ship) {
        echo "Error accessing ship";
    }
    $cust = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM customer WHERE cust_name='$cust_name'"));

?>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark ">
        <ul class="navbar-nav">
            <li class="nav-item">
                <h4><a class="nav-link" href="viewcustomer.php">Back</a></h4>
            </li>

        </ul>
    </nav>

    <div class="container">
        <div class="card w-75">
            <div class="card-header" style="background-color: #A21B00; color:bisque">Booking Details</div>

            <table class="table-success table-hover table-borderless p-3 m-5" style="text-align:center; background: linear-gradient(to right, #A21B00 0%, #FF2A00 50%, #8E1700 100%); color:aliceblue; font-size:1.2em;cursor:pointer;">
                <tbody>
                    <tr>
                        <td>ship ID</td>
                        <td><?php echo $ship['shipid']; ?></td>
                    </tr>
                    <tr>
                        <td>ship Name</td>
                        <td><?php echo $ship['shipname']; ?></td>
                    </tr>
                    <tr>
                        <td>Fare</td>
                        <td><?php echo $ship['fare']; ?></td>
                    </tr>
                    <tr>
                        <td>Seat Type</td>
                        <td><?php echo $ship['type']; ?></td>
                    </tr>
                    <tr>
                        <td>Agent Name</td>
                        <td><?php echo $ship['agentname']; ?></td>
                    </tr>
                    <tr>
                        <td>Agent Number</td>
                        <td><?php echo $ship['agentnumber']; ?></td>
                    </tr>
                </tbody>
            </table>

            <div class=" card-body">
                <form action="sqlbook.php" method="POST">
                    <label>User ID</label>
                    <input type="text" value="<?php echo $cust['cust_id']; ?>" class="form-control" disabled>
                    <br>
                    <label>Your Name</label>
                    <input type="text" value="<?php echo $cust['cust_name']; ?>" class="form-control" name="cust_name">
                    <br>
                    <label>Date</label>
                    <input type="datetime-local" class="form-control" name="date">
                    <br><br>
                    <input type="hidden" value="<?php echo $cust['cust_id']; ?>" name="cust_id">
                    <input type="hidden" value="<?php echo $ship['shipid']; ?>" name="trans_id">
                    <input type="hidden" value="<?php echo $ship['shipname']; ?>" name="trans_name">
                    <input type="hidden" value="<?php echo $ship['fare']; ?>" name="trans_fare">
                    <input type="submit" name="submit" value="confirm booking" class="btn btn-success">
                </form>

            </div>

        </div>
    <?php
}
    ?>