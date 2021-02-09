<?php
error_reporting(error_reporting() & ~E_NOTICE);
session_start();
$user = $_SESSION['username'];
include('condb.php');

// ทำการ check ว่าลูกค้าทำการจองโตะหรือยัง?
$check = "SELECT booking_table.tableId
        FROM booking_table, tables
        WHERE booking_table.username = '$user'
            AND booking_table.tableId = tables.tableId
            AND tableStatus = 0 
";
$result1 = mysqli_query($con, $check) or die(mysqli_error());
$num=mysqli_num_rows($result1);

if($num == 0)
{
echo "<script>";
echo "alert(' คุณยังไม่ได้ทำการจองโต๊ะ โปรดทำการจองโต๊ะก่อนครับ!');";
echo "window.location = 'booking_table.php';" ;
echo "</script>";
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Shopping Cart devbanban</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">

                <p><a href="cart.php" class="btn btn-primary">กลับหน้ารายการอาหาร</a> &nbsp;
                    <!--<button class="btn btn-primary" onClick="window.print()"> print </button></p> -->
                    <table width="700" border="1" align="center" class="table">
                        <tr>
                            <td width="1558" colspan="5" align="center">
                                <strong>ยืนยันออเดอร์</strong></td>
                        </tr>
                        <tr class="success">
                            <td align="center">ลำดับ</td>
                            <td align="center">อาหาร</td>
                            <td align="center">ราคา</td>
                            <td align="center">จำนวน</td>
                            <td align="center">รวม/รายการ</td>
                        </tr>
                        <?php
                        require_once('connect.php');
                        $total = 0;
                        foreach ($_SESSION['shopping_cart'] as $p_id => $p_qty) {
                            $menu = $pdo->prepare("SELECT * from menu where menuId='$p_id'");
                            $menu->execute();
                            $row = $menu->fetch();
                            $sum = $row['menuPrice'] * $p_qty;
                            $total += $sum;
                            echo "<tr>";
                            echo "<td align='center'>";
                            echo  $i += 1;
                            echo "</td>";
                            echo "<td>" . $row["menuTHname"] . "</td>";
                            echo "<td align='right'>" . number_format($row['menuPrice'], 2) . "</td>";
                            echo "<td align='right'>$p_qty</td>";
                            echo "<td align='right'>" . number_format($sum, 2) . "</td>";
                            echo "</tr>";
                        }
                        echo "<tr>";
                        echo "<td  align='right' colspan='4'><b>รวม</b></td>";
                        echo "<td align='right'>" . "<b>" . number_format($total, 2) . "</b>" . "</td>";
                        echo "</tr>";
                        ?>
                    </table>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-5" style="background-color:#f4f4f4">
                <h3 align="center" style="color:green">
                    <span class="glyphicon glyphicon-cutlery"> </span>
                    confirm Order </h3>
                <form name="formlogin" action="cart_check.php" method="POST" id="login" class="form-horizontal">
                    <div class="form-group">
                        <div class="col-sm-12" align="center">
                            <button type="submit" class="btn btn-primary" id="btn">
                                ยืนยันรายการอาหาร </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


</body>

</html>