<?php include('./includes/headers.php'); session_start(); ?>
<?php if (!$_SESSION['auth_id']) {
    header('Location: login.php');
} ?>
<html>
    <?php print_header(); ?>
    <body>
        <div class="container tight-container">
            <nav class="container-nav">
                <div class="nav-item activated">Launch Page</div>
                <div class="nav-item">Pending Orders</div>
                <div class="nav-item">Launch</div>
                <div class="nav-item">Launch</div>
            </nav>
            <div class="container-main">
                <div class="panel centered">
                    <b>Welcome to the landing page!</b>
                    <p>Use the navigation bar on the site to track orders from clients and track the status of any transactions.</p>
                </div>
            </div>
        </div>
        <?php print_footer() ?>
    </body>
</html>