<?php

include('../database.php');
$nid = $_GET['tid'];
$update_query = "UPDATE contact SET message_read='1' WHERE id='$nid'";
$res = mysqli_query($con, $update_query);

$query2 = "select * from contact where contact.id='$nid'";
$res2 = mysqli_query($con, $query2);
$result1 = mysqli_fetch_array($res2);

session_start();

if (isset($_SESSION['login_user'])) {

?>


    <!DOCTYPE html>
    <html>

    <head>
        <?php include 'head.php'; ?>
        <style>
            .view_message {
                margin-top: 5%;
                margin-left: 10%;
                margin-right: 10%;
            }
        </style>
    </head>

    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <?php include 'top_menu.php'; ?>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <?php include 'sidenav.php'; ?>
            </div>
            <div id="layoutSidenav_content">
                <center>
                    <div class="view_message">
                        <h2 class="text-info" style="font-size:20px;">MESSAGE</h2>
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading"><?php echo $result1['message']; ?></div>
                            </div>
                        </div>
                    </div>
                </center>

                <footer class="py-4 bg-light mt-auto" style="margin-top:10%;">
                    <div class="container-fluid">
                        <?php include 'footer.php'; ?>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="admin_page/dist/assets/demo/chart-area-demo.js"></script>
        <script src="admin_page/dist/assets/demo/chart-bar-demo.js"></script>
        <script src="admin_page/dist/assets/demo/datatables-demo.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#userTable').DataTable();
            });
        </script>
    </body>

    </html>

<?php
} else {
    header("location: index.php");
}
?>