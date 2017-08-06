<?php include('./includes/headers.php'); ?>
<html>
    <?php print_header(); ?>
    <body>
        <div class="container">
            <div class="login-box">
                <form method="post" action="submit_login.php">
                    <h4>Register</h4>
                    <div class="login-box-select">
                        <a class="login-box-selector">Login</a>
                        <a class="login-box-selector">Register</a>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield">
                        <input name="login_email" class="mdl-textfield__input" type="text" id="login_email">
                        <label class="mdl-textfield__label" for="login_email">Email Address</label>
                    </div><br>
                    <div class="mdl-textfield mdl-js-textfield">
                        <input name="login_password" class="mdl-textfield__input" type="password" id="login_password">
                        <label class="mdl-textfield__label" for="login_password">Password</label>
                    </div><br>
                    <input name="register" type="checkbox" value="true" checked style="display: none;"/>
                    <input class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" name="submit" type="submit" value="Submit"/>
                </form>
            </div>
        </div>
        <?php print_footer() ?>
    </body>
</html>