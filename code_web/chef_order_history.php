<?php SESSION_start();
include "condb.php";
$staffId = $_SESSION['staffId'];
$staffName = $_SESSION['staffName'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>History</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/shop-homepage.css" rel="stylesheet">
</head>

<?php session_start();
if (empty($_SESSION["staffId"])) {
    header("location: login_staff_index.php");
}
?>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="chef_order.php">Ruen Mallika</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="chef_order.php">Kitchen
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login_logout.php">logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-lg-3">

                <h1 class="my-3">CHEF: </h1>
                <?= $staffName."<br>" ?>
                <?="STAFF ID :".$staffId."<br>"?>
                <div class="list-group">
                    <a href="chef_order.php" class="list-group-item">ถอยกลับ</a>
                </div>

            </div>
            <!-- /.col-lg-3 -->

            <div class="col-lg-9">
                <?php
                
                $query = "SELECT *
                FROM orders 
                WHERE orderStatus = 'Done'
                ORDER BY orderId ASC" 
                or die("Error:" . mysqli_error());
                
                $result = mysqli_query($con, $query);
                //echo($query_monk);
                ?>
                <h1>
                    <center>HISTORY</center>
                </h1>
                
                <div class="form-group">
                    <div class="col-sm-12">
                        <?php
                        echo ' <table id="example1" class="table table-bordered table-striped">';
                        echo "<thead>";
                        echo "<tr class='info'>
                        <th>OrderID</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>ดูเมนู</th>
                        </tr>";
                        echo "</thead>";
                        
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<tr>";
                            echo "<td>" . $row["orderId"] .  "</td> ";
                            echo "<td>" . $row["orderDate"] .  "</td> ";
                            echo "<td>" . $row["amount"] .  "</td> ";
                            echo "<td>" . $row["orderStatus"] .  "</td> ";
                            echo "<td>" . "<a href='chef_order_history_menu.php?ID=" . $row['orderId'] . "'>ดูเมนู</a>" . "</td> ";
                            echo "</tr>";
                        }
            
                        echo "</table>";
                        echo "<br>";
                        mysqli_close($con);
                        ?>
                    </div>
                </div>


                <!-- /.row -->

            </div>
            <!-- /.col-lg-9 -->

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>