<!DOCTYPE html>
<html lang="en">

<head>
    <?php SESSION_start();
    include "condb.php";
    include "bar.php";
    $username = $_SESSION['username'];
    $fname = $_SESSION['custFName'];
    $lname = $_SESSION['custLName'];

    ?>
</head>


<div class="container">

    <div class="row">

        <div class="col-lg-3">

            <h1 class="my-3">MEMBER: </h1>
            <?= "สวัสดี คุณ".$fname . "  ".$lname."<br>" ?>
            <?= "username:" . $username . "<br>" ?>
            <div class="list-group">
                <a href="member_myorder.php" class="list-group-item">ย้อนกลับ</a>
            </div>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">
            <?php

        $query = "SELECT receipt.receiptId, booking_table.tableId, orderId, orderDate, orderStatus, 
                orders.amount, orders.totalPrice
        FROM tables, booking_table, receipt, orders
        WHERE  username = '$username'
            AND booking_table.tableId = tables.tableId
            AND tables.tableId = receipt.tableId
            AND receipt.receiptId = orders.receiptId
            AND orderStatus = 'served'
        ORDER BY orderId ASC"
        or die("Error:" . mysqli_error());

            $result = mysqli_query($con, $query);
            //echo($query_monk);
            ?>
            <h1>
                <center>MY ORDER</center>
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
                <th>TotalPrice</th>
                <th>Status</th>
                <th>ดูเมนู</th>
                </tr>";
                    echo "</thead>";
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>" . $row["orderId"] .  "</td> ";
                        echo "<td>" . $row["orderDate"] .  "</td> ";
                        echo "<td>" . $row["amount"] .  "</td> ";
                        echo "<td>" . $row["totalPrice"] .  "</td> ";
                        echo "<td>" . $row["orderStatus"] .  "</td> ";
                        echo "<td>" . "<a href='member_myorder_history_menu.php?ID=" . $row['orderId'] . "'>ดูเมนู</a>" . "</td> ";
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