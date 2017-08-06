<?php include('../includes/headers.php'); session_start(); ?>
<?php if (!$_SESSION['auth_id']) {
    header('Location: login.php');
} ?>
<html>
    <?php print_header(); ?>
    <body>
        <div class="container tight-container">
            <nav class="container-nav">
                <a class="nav-item activated">Launch Page</a>
                <a class="nav-item" href="status.php">My Orders</a>
            </nav>
            <div class="container-main">
                <div class="panel centered">
                    <b>Welcome to the landing page!</b>
                    <p>Use the navigation bar on the site to track your orders.</p>
                </div>
            </div>
        </div>
        <?php print_footer() ?>
    </body>
</html>