<?php
include('header.php');
echo $_SESSION['name'];
if ($_SESSION['name'] != "NULL") {


?>
    <div class="containter">
        <div class="d-flex justify-content-center">
            <br /><br />
            <div class="card" style="margin-top:50px;margin-bottom: 100px;">
                <div class="card-header" style="background-color: #A21B00; color:bisque">
                    <h4>User Registration</h4>
                </div>
                <div class="card-body ">
                    <span id="message"></span>
                    <form method="post" id="user_register_form" action="sqlregisteradmin.php" style="width:25em;">
                        <div class="form-group">
                            <label>Enter Name</label>
                            <input type="text" id="user_email_address" class="form-control" name="name" />
                        </div>
                        <div class="form-group">
                            <label>Enter Password</label>
                            <input type="password" id="user_password" class="form-control" name="password" />
                        </div>
                        <div class="form-group">
                            <label>Enter Confirm Password</label>
                            <input type="password" id="confirm_user_password" class="form-control" />
                        </div>
                        <br />
                        <div class="form-group" align="center">
                            <input type="submit" id="user_register" class="btn btn-success" value="Register" name="submit" />
                        </div>
                    </form>
                    <div align="center">
                        <a href="login.php">Login</a>
                    </div>
                </div>
            </div>
            <br /><br />
            <br /><br />
        </div>
    </div>
    </body>

    </html>
<?php } else {
    echo "error";
}
?>