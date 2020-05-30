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
        <div class="container">
            <div class="card">
                <div class="card-header" style="background-color: #A21B00; color:bisque; text-align:center; font-size:1.2em">Book travel</div>

                <div class="card-body">
                    <div class="form-group">
                        <label>Transport type</label>

                        <select class="form-control" id="transporttype">
                            <option selected>Select type of transport</option>
                            <option value="car">Car</option>
                            <option value="bus">Bus</option>
                            <option value="train">Train</option>
                            <option value="flight">Flight</option>
                            <option value="ship">Ship</option>
                        </select>
                    </div>
                    <div class="form-group" id="optcar">
                        <form method="POST" action="sqladdcar.php" class="form-group">
                            <label>Car Name</label>
                            <input type="text" name="name" class="form-control">
                            <label>Car fare</label>
                            <input type="text" name="fare" class="form-control">
                            <label>Car seattype</label>
                            <input type="text" name="seattype" class="form-control">
                            <label>Car driver name </label>
                            <input type="text" name="drivername" class="form-control">
                            <label>Car driver number </label>
                            <input type="text" name="drivernumber" class="form-control">

                            <br>
                            <input type="submit" name="submit" class="btn btn-info">

                        </form>
                    </div>
                    <div class="form-group" id="optbus">
                        <form method="POST" action="sqladdbus.php" class="form-group">
                            <label>Bus Name</label>
                            <input type="text" name="name" class="form-control">
                            <label>Bus fare</label>
                            <input type="text" name="fare" class="form-control">
                            <label>Bus type</label>
                            <input type="text" name="type" class="form-control">
                            <label>Bus driver name </label>
                            <input type="text" name="drivername" class="form-control">
                            <label>Bus driver number </label>
                            <input type="text" name="drivernumber" class="form-control">

                            <br>
                            <input type="submit" name="submit" class="btn btn-info">
                        </form>
                    </div>
                    <div class="form-group" id="opttrain">
                        <form method="POST" action="sqladdtrain.php" class="form-group">
                            <label>train Name</label>
                            <input type="text" name="name" class="form-control">
                            <label>train fare</label>
                            <input type="text" name="fare" class="form-control">
                            <label>train seattype</label>
                            <input type="text" name="type" class="form-control">
                            <label>train agent name </label>
                            <input type="text" name="drivername" class="form-control">
                            <label>train agent number </label>
                            <input type="text" name="drivernumber" class="form-control">

                            <br>
                            <input type="submit" name="submit" class="btn btn-info">
                        </form>
                    </div>
                    <div class="form-group" id="optflight">
                        <form method="POST" action="sqladdflight.php" class="form-group">
                            <label>Flight Name</label>
                            <input type="text" name="name" class="form-control">
                            <label>Flight fare</label>
                            <input type="text" name="fare" class="form-control">
                            <label>Flight type</label>
                            <input type="text" name="type" class="form-control">
                            <label>Flight Agent name </label>
                            <input type="text" name="drivername" class="form-control">
                            <label>Flight agent number </label>
                            <input type="text" name="drivernumber" class="form-control">

                            <br>
                            <input type="submit" name="submit" class="btn btn-info">
                        </form>
                    </div>
                    <div class="form-group" id="optship">
                        <form method="POST" action="sqladdship.php" class="form-group">
                            <label>ship Name</label>
                            <input type="text" name="name" class="form-control">
                            <label>ship fare</label>
                            <input type="text" name="fare" class="form-control">
                            <label>ship seattype</label>
                            <input type="text" name="type" class="form-control">
                            <label>ship agent name </label>
                            <input type="text" name="drivername" class="form-control">
                            <label>ship agent number </label>
                            <input type="text" name="drivernumber" class="form-control">

                            <br>
                            <input type="submit" name="submit" class="btn btn-info">
                        </form>
                    </div>

                </div>

            </div>
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