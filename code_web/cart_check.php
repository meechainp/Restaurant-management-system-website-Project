<?php
error_reporting(error_reporting() & ~E_NOTICE);
session_start();
$user = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Confirm</title>
</head>

<body>
    <!--สร้างตัวแปรสำหรับบันทึกการสั่งซื้อ -->
    <?php
    include('condb.php');

    require_once('connect.php');
    //Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
    date_default_timezone_set('Asia/Bangkok');
    $order_date = date("Y-m-d H:i:s"); //datetime

    $check_recipt = "
    SELECT booking_table.tableId, receiptId
    FROM booking_table, tables, receipt
    WHERE booking_table.tableId = tables.tableId
        AND tables.tableId = receipt.tableId
        AND booking_table.username = '$user'
        AND receiptStatus = 'NotFinished'
            ";
    $result_check = mysqli_query($con, $check_recipt) or die(mysqli_error());
    $num = mysqli_num_rows($result_check);

    if ($num == 0) {


        $gtartid = "R"; //ตัวขึ้นต้น
        $startnumber = "1000000000"; //รันตัวเลข

        $sqlAuto = $pdo->prepare("SELECT * FROM receipt;");
        $sqlAuto->execute();
        while ($row = $sqlAuto->fetch()) {
            $rowcount = $rowcount + 1;
        }
        $maxId = ($rowcount + 1);
        $maxId = substr($startnumber . $maxId, -9);
        $autoid_receipt = $gtartid . $maxId;

        // $sumprice = 0;
        // $sumcount = 0;
        foreach ($_SESSION['shopping_cart'] as $p_id => $p_qty) {
            $menu = $pdo->prepare("SELECT * FROM menu WHERE menuId='$p_id';");
            $menu->execute();
            while ($row = $menu->fetch()) {
                $totalPrice = $totalPrice+($row['menuPrice'] * $p_qty);
                $amount = $amount+$p_qty;
            }
        }


        
        // query tableId, staffId for insert into receipt and orders
        $receipt = $pdo->prepare("SELECT booking_table.tableId, staffId
        FROM booking_table, tables
        WHERE username = '$user'
            AND booking_table.tableId = tables.tableId
            AND tableStatus = 0;");
        $receipt->execute();
        $row_receipt = $receipt->fetch();


        $ins_receipt = $pdo->prepare("INSERT INTO receipt 
                VALUES('$autoid_receipt','$row_receipt[staffId]','$row_receipt[tableId]','','', '','NotFinished',null);");
        $ins_receipt->execute();


        $gtartid2 = "Q"; //ตัวขึ้นต้น
        $startnumber2 = "1000000000"; //รันตัวเลข

        $sqlAuto2 = $pdo->prepare("SELECT * FROM orders;");
        $sqlAuto2->execute();
        while ($row = $sqlAuto2->fetch()) {
            $rowcount = $rowcount + 1;
        }
        $maxId2 = ($rowcount + 1);
        $maxId2 = substr($startnumber2 . $maxId2, -9);
        $autoid_order = $gtartid2 . $maxId2;


        //insert order
        $ins_order = $pdo->prepare("INSERT INTO orders VALUES('$autoid_order','$autoid_receipt','$row_receipt[staffId]', '$row_receipt[tableId]', '$totalPrice', '$order_date','Doing','$amount');");
        $ins_order->execute();

        foreach ($_SESSION['shopping_cart'] as $p_id => $p_qty) {
            $menu = $pdo->prepare("SELECT * FROM menu WHERE menuId='$p_id';");
            $menu->execute();
            while ($row = $menu->fetch()) {
                $total = $row['menuPrice'] * $p_qty;

                $ins_cart = $pdo->prepare("INSERT INTO cart VALUES('$autoid_order','$row[menuId]','$p_qty','$row[menuPrice]','$total','Doing');");
                $ins_cart->execute();

            }
        }


        $ins_kitchen = $pdo->prepare("INSERT INTO kitchen VALUES('$autoid_order','Doing');");
        $ins_kitchen->execute();

        if ($ins_receipt && $ins_order && $ins_cart && $ins_kitchen) {
            mysqli_query($con, "COMMIT");
            $msg = "บันทึกข้อมูลเรียบร้อยแล้ว ";
            foreach ($_SESSION['shopping_cart'] as $p_id) {
                unset($_SESSION['shopping_cart']);
            }
        } else {
            mysqli_query($con, "ROLLBACK");
            $msg = "บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อเจ้าหน้าที่ค่ะ ";
        }
    } else {
        //$order_date = date("Y-m-d H:i:s");//datetime
        // $sumprice = 0;
        // $sumcount = 0;
        foreach ($_SESSION['shopping_cart'] as $p_id => $p_qty) {
            $menu = $pdo->prepare("SELECT * FROM menu WHERE menuId='$p_id'");
            $menu->execute();
            while ($row = $menu->fetch()) {
                $totalPrice = $totalPrice+($row['menuPrice'] * $p_qty);
                $amount = $amount+$p_qty;
            }
        }


        // query tableId, staffId, receiptId for insert into orders
        $query_receipt = $pdo->prepare("SELECT booking_table.tableId, receipt.staffId, receiptId
        FROM booking_table, tables, receipt
        WHERE booking_table.username = '$user'
            AND booking_table.tableId = tables.tableId
            AND tables.tableId = receipt.tableId
            AND tableStatus = 0;");
        $query_receipt->execute();
        $row_receipt = $query_receipt->fetch();


        $gtartid2 = "Q"; //ตัวขึ้นต้น
        $startnumber2 = "1000000000"; //รันตัวเลข

        $sqlAuto2 = $pdo->prepare("SELECT * FROM orders;");
        $sqlAuto2->execute();
        while ($row = $sqlAuto2->fetch()) {
            $rowcount =$rowcount + 1;
        }
        $maxId2 = ($rowcount +1);
        $maxId2 = substr($startnumber2 . $maxId2, -9);
        $autoid_order = $gtartid2 . $maxId2;


        //insert order
        $ins_order = $pdo->prepare("INSERT INTO orders VALUES('$autoid_order','$row_receipt[receiptId]','$row_receipt[staffId]', '$row_receipt[tableId]', '$totalPrice', '$order_date','Doing','$amount');");
        $ins_order->execute();


        //insert cart
        foreach ($_SESSION['shopping_cart'] as $p_id => $p_qty) {
            $menu = $pdo->prepare("SELECT * FROM menu WHERE menuId='$p_id';");
            $menu->execute();
            while ($row = $menu->fetch()) {
                $total = $row['menuPrice'] * $p_qty;

                $ins_cart = $pdo->prepare("INSERT INTO cart VALUES('$autoid_order','$row[menuId]','$p_qty','$row[menuPrice]','$total','Doing');");
                $ins_cart->execute();
            }
        }


        $ins_kitchen = $pdo->prepare("INSERT INTO kitchen VALUES('$autoid_order','Doing');");
        $ins_kitchen->execute();

        if ($ins_order && $ins_cart && $ins_kitchen) {
            mysqli_query($con, "COMMIT");
            $msg = "บันทึกข้อมูลเรียบร้อยแล้ว ";
            foreach ($_SESSION['shopping_cart'] as $p_id) {
                unset($_SESSION['shopping_cart']);
            }
        } else {
            mysqli_query($con, "ROLLBACK");
            $msg = "บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อเจ้าหน้าที่ค่ะ ";
        }
    }

    ?>
    <script type="text/javascript">
        alert("<?php echo $msg; ?>");
        window.location = 'index.php';
    </script>
</body>

</html>