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
    <div class="container">
        <div class="card">
            <div class="card-header" style="background-color: #A21B00; color:bisque">Book travel</div>
            <form method="POST" action="" class="w-75 p-3">
                <div class="card-body">
                    <div class="form-group">
                        <label>Transport type</label>

                        <select class="form-control" id="transporttype">
                            <option>Select Type of transport</option>
                            <option value="car">Car</option>
                            <option value="bus">Bus</option>
                            <option value="train">Train</option>
                            <option value="flight">Flight</option>
                            <option value="ship">Ship</option>
                        </select>
                    </div>
                    <div class="form-group" id="optcar">
                        <table class="table table-bordered table-hover">
                            <thead style="background-color: #A21B00; color:bisque">
                                <tr>
                                    <th scope="col">CAR Name</th>
                                    <th scope="col">Seater Type</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Driver Name</th>
                                    <th scope="col">Driver Contact</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $car = mysqli_query($con, "SELECT * FROM `car`");
                                if (mysqli_num_rows($car)) {
                                    while ($row = mysqli_fetch_assoc($car)) {

                                ?>
                                        <tr>
                                            <th scope="row"><?php echo $row['carname'] ?></th>
                                            <td><?php echo $row['seattype'] ?></td>
                                            <td><?php echo $row['fare'] ?></td>
                                            <td><?php echo $row['drivername'] ?></td>
                                            <td><?php echo $row['drivernumber'] ?></td>
                                            <td>
                                                <form action="sqldeletecar.php" method="POST">
                                                    <input type="hidden" name="cust_name" value="<?php echo $usr; ?>">
                                                    <input type="hidden" name="id" value="<?php echo $row['carid']; ?>">
                                                    <input type="submit" value="Delete" name="submit" class="btn btn-warning">
                                                </form>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>

                    </div>
                    <div class="form-group" id="optbus">bus
                        <table class="table table-bordered table-hover">
                            <thead style="background-color: #A21B00; color:bisque">
                                <tr>
                                    <th scope="col">bus Name</th>
                                    <th scope="col">bus Type</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Driver Name</th>
                                    <th scope="col">Driver Contact</th>
                                    <th scope="col">DELETE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $car = mysqli_query($con, "SELECT * FROM `bus`");
                                if (mysqli_num_rows($car)) {
                                    while ($row = mysqli_fetch_assoc($car)) {

                                ?>
                                        <tr>
                                            <th scope="row"><?php echo $row['busname'] ?></th>
                                            <td><?php echo $row['type'] ?></td>
                                            <td><?php echo $row['fare'] ?></td>
                                            <td><?php echo $row['drivername'] ?></td>
                                            <td><?php echo $row['drivernumber'] ?></td>
                                            <td>
                                                <form action="sqldeletebus.php" method="POST">
                                                    <input type="hidden" name="cust_name" value="<?php echo $usr; ?>">
                                                    <input type="hidden" name="id" value="<?php echo $row['busid']; ?>">
                                                    <input type="submit" value="Delete" name="submit" class="btn btn-warning">
                                                </form>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group" id="opttrain">train
                        <table class="table table-bordered table-hover">
                            <thead style="background-color: #A21B00; color:bisque">
                                <tr>
                                    <th scope="col">train Name</th>
                                    <th scope="col">train Type</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Agent Name</th>
                                    <th scope="col">Agent Contact</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $car = mysqli_query($con, "SELECT * FROM `train`");
                                if (mysqli_num_rows($car)) {
                                    while ($row = mysqli_fetch_assoc($car)) {

                                ?>
                                        <tr>
                                            <th scope="row"><?php echo $row['trainname'] ?></th>
                                            <td><?php echo $row['type'] ?></td>
                                            <td><?php echo $row['fare'] ?></td>
                                            <td><?php echo $row['agentname'] ?></td>
                                            <td><?php echo $row['agentnumber'] ?></td>
                                            <td>
                                                <form action="sqldeletetrain.php" method="POST">
                                                    <input type="hidden" name="cust_name" value="<?php echo $usr; ?>">
                                                    <input type="hidden" name="id" value="<?php echo $row['trainid']; ?>">
                                                    <input type="submit" value="Delete" name="submit" class="btn btn-warning">
                                                </form>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group" id="optflight">flight
                        <table class="table table-bordered table-hover">
                            <thead style="background-color: #A21B00; color:bisque">
                                <tr>
                                    <th scope="col">flight Name</th>
                                    <th scope="col">flight Type</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Agent Name</th>
                                    <th scope="col">Agent Contact</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $car = mysqli_query($con, "SELECT * FROM `flight`");
                                if (mysqli_num_rows($car)) {
                                    while ($row = mysqli_fetch_assoc($car)) {

                                ?>
                                        <tr>
                                            <th scope="row"><?php echo $row['flightname'] ?></th>
                                            <td><?php echo $row['type'] ?></td>
                                            <td><?php echo $row['fare'] ?></td>
                                            <td><?php echo $row['agentname'] ?></td>
                                            <td><?php echo $row['agentnumber'] ?></td>
                                            <td>
                                                <form action="sqldeleteflight.php" method="POST">
                                                    <input type="hidden" name="cust_name" value="<?php echo $usr; ?>">
                                                    <input type="hidden" name="id" value="<?php echo $row['flightid']; ?>">
                                                    <input type="submit" value="Delete" name="submit" class="btn btn-warning">
                                                </form>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group" id="optship">ship
                        <table class="table table-bordered table-hover">
                            <thead style="background-color: #A21B00; color:bisque">
                                <tr>
                                    <th scope="col">ship Name</th>
                                    <th scope="col">ship Type</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Agent Name</th>
                                    <th scope="col">Agent Contact</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $car = mysqli_query($con, "SELECT * FROM `ship`");
                                if (mysqli_num_rows($car)) {
                                    while ($row = mysqli_fetch_assoc($car)) {

                                ?>
                                        <tr>
                                            <th scope="row"><?php echo $row['shipname'] ?></th>
                                            <td><?php echo $row['type'] ?></td>
                                            <td><?php echo $row['fare'] ?></td>
                                            <td><?php echo $row['agentname'] ?></td>
                                            <td><?php echo $row['agentname'] ?></td>
                                            <td>
                                                <form action="sqldeleteship.php" method="POST">
                                                    <input type="hidden" name="cust_name" value="<?php echo $usr; ?>">
                                                    <input type="hidden" name="id" value="<?php echo $row['shipid']; ?>">
                                                    < <input type="submit" value="Delete" name="submit" class="btn btn-warning">
                                                </form>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </form>
        </div>
    </div>
    <!-- Transport Option JQuery Script -->
    <script>
        $("#optcar").hide();
        $("#optbus").hide();
        $("#opttrain").hide();
        $("#optflight").hide();
        $("#optship").hide();
        $("#transporttype").change(function() {
            if ($(this).val() == "car") {
                $("#optcar").show();
            } else {
                $("#optcar").hide();
            }
        });
        $("#transporttype").trigger("change");

        $("#transporttype").change(function() {
            if ($(this).val() == "bus") {
                $("#optbus").show();
            } else {
                $("#optbus").hide();
            }
        });
        $("#transporttype").trigger("change");

        $("#transporttype").change(function() {
            if ($(this).val() == "train") {
                $("#opttrain").show();
            } else {
                $("#opttrain").hide();
            }
        });
        $("#transporttype").trigger("change");

        $("#transporttype").change(function() {
            if ($(this).val() == "flight") {
                $("#optflight").show();
            } else {
                $("#optflight").hide();
            }
        });
        $("#transporttype").trigger("change");

        $("#transporttype").change(function() {
            if ($(this).val() == "ship") {
                $("#optship").show();
            } else {
                $("#optship").hide();
            }
        });
        $("#transporttype").trigger("change");
    </script>

<?php } ?>