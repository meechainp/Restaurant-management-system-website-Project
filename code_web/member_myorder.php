<?php SESSION_start();
    require_once('connect.php');
    include "condb.php";
    include "bar.php";
    $username = $_SESSION['username'];
    $fname = $_SESSION['custFName'];
    $lname = $_SESSION['custLName'];

    ?>
<!DOCTYPE html>
<html lang="en">

<head>

</head>


<div class="container">

    <div class="row">

        <div class="col-lg-3">

            <h1 class="my-3">MEMBER: </h1>
            <?= "สวัสดี คุณ" . $fname . "  " . $lname . "<br>" ?>
            <?= "username:" . $username . "<br>" ?>
            <div class="list-group">
                <a href="member_myorder_history.php" class="list-group-item">ประวัติออเดอร์</a>
            </div>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">
            <?php

            $query = "SELECT orderId, orderDate, tableName, orders.amount, orders.totalPrice, orderStatus
            FROM orders, tables, booking_table, receipt
            WHERE orders.receiptId = receipt.receiptId
                AND orders.tableId =  receipt.tableId
                AND receipt.tableId = tables.tableId
                AND tables.tableId = booking_table.tableId
                AND username = '$username'
                AND tableStatus = 0
                AND receiptStatus != 'Finished'
GROUP by  orderId, orderDate, tableName, orders.amount, orders.totalPrice, orderStatus
        ORDER BY orderId ASC"
                or die("Error:" . mysqli_error());

            $result = mysqli_query($con, $query);
            //echo($query_monk);
            ?>
            <h1>
                <center>MY ORDER</center>
            </h1>
            <?php

            $query1 = $pdo->prepare("SELECT receiptId
                        FROM booking_table, tables, receipt
                        WHERE booking_table.tableId = tables.tableId
                            AND tables.tableId = receipt.tableId
                            AND username = '$username'
                            AND receiptStatus = 'NotFinished';")
                or die("Error:" . mysqli_error());
                $query1->execute();
                $row1 = $query1->fetch();
                

            ?>
            <div class="form-group">
            <a href="member_update_receipt_db.php?ID=<?php echo $row1['receiptId']; ?>" class='btn btn-danger btn-xs'  onclick="return confirm('ต้องการรับใบเสร็จ')">รับใบเสร็จ</a>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <?php
                    echo ' <table id="example1" class="table table-bordered table-striped">';
                    echo "<thead>";
                    echo "<tr class='info'>
                <th>OrderID</th>
                <th>Date</th>
                <th>Table</th>
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
                        echo "<td>" . $row["tableName"] .  "</td> ";
                        echo "<td>" . $row["amount"] .  "</td> ";
                        echo "<td>" . $row["totalPrice"] .  "</td> ";
                        echo "<td>" . $row["orderStatus"] .  "</td> ";
                        echo "<td>" . "<a href='member_myorder_menu.php?ID=" . $row['orderId'] . "'>ดูเมนู</a>" . "</td> ";
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