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
    <title>ORDER</title>
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
            <a class="navbar-brand" href="staff_order.php">Ruen Mallika</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item ">
                        <a class="nav-link" href="staff_order.php">Home
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link " href="staff_charged.php">Charged
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

                <h1 class="my-3">STAFF: </h1>
                <?= $staffName . "<br>" ?>
                <?= "STAFF ID :" . $staffId . "<br>" ?>
                <div class="list-group">
                    <a href="staff_charged.php" class="list-group-item">ย้อนกลับ</a>
                </div>

            </div>
            <!-- /.col-lg-3 -->

            <div class="col-lg-9">
                <?php

                $query = "SELECT *
            FROM receipt
            WHERE staffId = '$staffId'
                AND receiptStatus = 'Finished'
            ORDER BY receiptId"
                    or die("Error:" . mysqli_error());

                $result = mysqli_query($con, $query);
                //echo($query_monk);
                ?>
                <h1>
                    <center>MY ORDER</center>
                </h1>

                <div class="form-group">
                    <div class="col-sm-14">
                        <?php
                        echo ' <table id="example1" class="table table-bordered table-striped">';
                        echo "<thead>";
                        echo "<tr class='info'>
                        <th>ReceiptId</th>
                        <th>Date</th>
                        <th>TableId</th>
                        <th>StaffId</th>
                        <th>Amount</th>
                        <th>TotalPrice</th>
                        <th>Status</th>
                        <th>พิมพ์ใบเสร็จ</th>
                        </tr>";
                        echo "</thead>";
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<tr>";
                            echo "<td>" . $row["receiptId"] .  "</td> ";
                            echo "<td>" . $row["receiptDate"] .  "</td> ";
                            echo "<td>" . $row["tableId"] .  "</td> ";
                            echo "<td>" . $row["staffId"] .  "</td> ";
                            echo "<td>" . $row["amount"] .  "</td> ";
                            echo "<td>" . $row["totalPrice"] .  "</td> ";
                            echo "<td>" . $row["receiptStatus"] .  "</td> ";
                            echo "<td>" . "<a href='Bill/processing.php?ID=" . $row['receiptId'] . "'>พิมพ์</a>" . "</td> ";
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