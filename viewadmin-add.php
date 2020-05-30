<?php
include("connect.php");
include("header.php");
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

<div class="container my-5">
    <div class="card w-75">
        <div class="card-header" style="background-color: #A21B00; color:bisque; text-align:center; font-size:1.2em">
            Add employee
        </div>
        <div class="card-body">
            <form method="POST" action="sqladdemp.php">
                <label>Employee Name</label> <br><input type="text" name="empname" class="form-control w-50"><br>
                <label>Employee Password</label><br><input type="password" name="password" class="form-control w-50"><br>
                <br>
                <input type="submit" name="submit" value="Register" class="btn btn-info">
            </form>
        </div>
    </div>
</div>