<?php

include('header.php');

?>

<div class="containter">
    <div class="d-flex justify-content-center">
        <br /><br />

        <div class="card" style="margin-top:50px;margin-bottom: 100px;">
            <div class="card-header">
                <h4>Change Password</h4>
            </div>
            <div class="card-body">
                <form method="post" id="change_password_form" action="sqlchangepassword.php">
                    <div class="form-group">
                        <label>Enter old Password</label>
                        <input type="password" name="password" id="user_password" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Enter new Password</label>
                        <input type="text" name="newpassword" id="confirm_user_password" class="form-control" />
                    </div>
                    <br />
                    <div class="form-group" align="center">
                        <input type="hidden" name="page" value="change_password" />
                        <input type="hidden" name="action" value="change_password" />
                        <input type="submit" name="submit" id="user_password" class="btn btn-info" value="Change" />
                    </div>
                </form>
            </div>
        </div>
        <br /><br />
        <br /><br />
    </div>
</div>

</body>

</html>