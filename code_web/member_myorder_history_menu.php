<!DOCTYPE html>
<html lang="en">

<head>
    <?php SESSION_start();
    include "condb.php";
    include "bar.php";
    $username = $_SESSION['username'];
    $fname = $_SESSION['custFName'];
    $lname = $_SESSION['custLName'];

    //รับ orderId จาก member_myorder
    $orderId = $_REQUEST['ID'];

    ?>
</head>


<div class="container">

    <div class="row">

        <div class="col-lg-3">

            <h1 class="my-3">MEMBER: </h1>
            <?= "สวัสดี คุณ" . $fname . "  " . $lname . "<br>" ?>
            <?= "username:" . $username . "<br>" ?>
            <div class="list-group">
                <a href="member_myorder_history.php" class="list-group-item">ย้อนกลับ</a>
            </div>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">
            <?php

            $query = "SELECT orders.orderId, cart.price, cart.totalPrice, orders.tableId
        menuTHname, cart.amount, cart.menuId, cartStatus
        FROM orders, cart, tables, menu, booking_table
        WHERE orders.orderId = '$orderId'
            AND orders.tableId = tables.tableId
            AND tables.tableId = booking_table.tableId
            AND username = '$username' -- เอาของ username ที่ login เข้ามาเท่านั้น
            AND orders.orderId = cart.orderId
            AND cart.menuId = menu.menuId
            AND cartStatus = 'served'
        ORDER BY cart.menuId ASC"
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
                <th>Menu</th>
                <th>Amount</th>
                <th>Price</th>
                <th>TotalPrice</th>
                <th>Status</th>
                </tr>";
                    echo "</thead>";
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>" . $row["orderId"] .  "</td> ";
                        echo "<td>" . $row["orderDate"] .  "</td> ";
                        echo "<td>" . $row["menuTHname"] .  "</td> ";
                        echo "<td>" . $row["amount"] .  "</td> ";
                        echo "<td>" . $row["price"] .  "</td> ";
                        echo "<td>" . $row["totalPrice"] .  "</td> ";
                        echo "<td>" . $row["cartStatus"] .  "</td> ";
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