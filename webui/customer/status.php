<?php include('../includes/headers.php'); session_start(); ?>
<?php if (!$_SESSION['auth_id']) {
    header('Location: login.php');
} ?>
<html>
    <?php print_header(); ?>
    <body>
        <div class="container tight-container">
            <nav class="container-nav">
                <a class="nav-item" href="index.php">Launch Page</a>
                <a class="nav-item activated">My Orders</a>
            </nav>
            <div class="container-main">
                <h4 style="margin: 0;">My Orders</h4>
                <br>
                <table id="table-status">
                    <tr>
                        <th style="width: 140px;">Item No.</th>
                        <th style="width: 240px;">Item Name</th>
                        <th style="width: 160px;">Status</th>
                    </tr>
                    <tr class='data'>
                        <td style="width: 140px;">(no number)</td>
                        <td style="width: 340px;">Loading...</td>
                        <td><i class="material-icons table-status">fiber_manual_record</i> Unknown</td>
                    </tr>
                </table>
            </div>
        </div>
        <script>
            var oldData = {};
            function refreshTable() {
                $.ajax({url: "../api/get_requests.php", dataType: 'json', success: function(result){
                    if (oldData != result) {
                        $("tr.data").remove();
                        oldData = result;
                        for (var row in result) {
                            row = result[row];
                            let status = `<i class="material-icons table-status">fiber_manual_record</i> Unknown`;
                            switch (row.result) {
                                case 0:
                                    status = `<i class="material-icons table-status red">fiber_manual_record</i> Not Approved`;
                                    break;
                                case 1:
                                    status = `<i class="material-icons table-status green">fiber_manual_record</i> Approved`;
                                    break;
                                case 2:
                                    status = `<i class="material-icons table-status yellow">fiber_manual_record</i> Pending`;
                                    break;
                                case 3:
                                    status = `<i class="material-icons table-status orange">fiber_manual_record</i> Insufficient Data`;
                                    break;
                            }
                            

                            $("#table-status").append(`
                                <tr class='data'>
                                    <td style="width: 140px;">${row.id}</td>
                                    <td style="width: 340px;">${row.item_name}</td>
                                    <td>${status}</td>
                                </tr>
                            `);
                        }
                        //alert('updated');
                    } else {
                        //alert('old data!');
                    }
                }});
            }
            refreshTable();
            setInterval(refreshTable, 5000);
        </script>
        <?php print_footer() ?>
    </body>
</html>