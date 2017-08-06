<?php
    // auth_id
    // auth_username
    // auth_warehouse_id
    session_start();
    include('includes/db.php');
    // use sha1 for now

    if ($_POST['register'] == true && count($result) == 0) {
        // create an account
        $result = perform_query("SELECT * FROM users WHERE email = :email", array(
            'email' => $_POST['login_email']
        ));
        if (count($result) == 0) {
            // no account, let's create one
            $result = perform_query("INSERT INTO users (email, password) VALUES (:email, :password)", array(
                'email' => $_POST['login_email'],
                'password' => sha1($_POST['login_password'])
            ), false);
            if ($result) {
                // log them in
                $result = perform_query("SELECT * FROM users WHERE email = :email AND password = :password", array(
                    'email' => $_POST['login_email'],
                    'password' => sha1($_POST['login_password'])
                ));
                if (count($result) == 1) {
                    $_SESSION['auth_id'] = $result[0]['id'];
                    $_SESSION['auth_email'] = $result[0]['email'];
                    $_SESSION['auth_warehouse_id'] = $result[0]['warehouseId'];
                    header("Location: admin.php");
                } else {
                    header("Location: login.php");
                }
            }
        } else {
            // already have an account
            header("Location: login.php");
        }
    } else {
        // login with account
        $result = perform_query("SELECT * FROM users WHERE email = :email AND password = :password", array(
            'email' => $_POST['login_email'],
            'password' => sha1($_POST['login_password'])
        ));
        if (count($result) == 1) {
            $_SESSION['auth_id'] = $result[0]['id'];
            $_SESSION['auth_email'] = $result[0]['email'];
            $_SESSION['auth_warehouse_id'] = $result[0]['warehouseId'];
            header("Location: admin.php");
        } else {
            header("Location: login.php");
        }
    }

?>