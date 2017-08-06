<?php
    include('../includes/db.php');
    $result = perform_query("SELECT * FROM request");
    echo json_encode($result);
?>