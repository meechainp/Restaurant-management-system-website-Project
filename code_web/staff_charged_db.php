<meta charset="UTF-8">
<?php
//1. เชื่อมต่อ database: 
include('condb.php');
require_once('connect.php');
session_start();
$staffId = $_SESSION['staffId'];
$receiptId = $_REQUEST["ID"];

//ลบข้อมูลออกจาก database ตาม member_id ที่ส่งมา
$check = "
	SELECT  * 
	FROM orders  
	WHERE receiptId = '$receiptId' AND orderStatus != 'Served'
	";
$result1 = mysqli_query($con, $check) or die(mysqli_error());
$num = mysqli_num_rows($result1);

if ($num > 0) {
    echo "<script>";
    echo "alert(' ยังมีรายการอาหารที่ยังทำไม่เสร็จหรือยังไม่ได้ทำการเสิร์ฟให้ลูกค้า!');";
    echo "window.history.back();";
    echo "</script>";
} else {

    //Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
    date_default_timezone_set('Asia/Bangkok');
    $date = date("Y-m-d H:i:s"); //datetime
    $month = date("m");

    $query = $pdo->prepare("SELECT receipt.receiptId, tableName, orderId,
         SUM(orders.amount) as amt, 
        SUM(orders.totaLPrice) as tot,
         receiptStatus, tables.tableId
    FROM receipt, orders, tables
    WHERE receipt.receiptId = '$receiptId'
        AND '$receiptId' = orders.receiptId
        AND orders.tableId = tables.tableId;");
    $query->execute();
    $row = $query->fetch();


    $update_receipt = "UPDATE receipt
    SET    receiptStatus = 'Finished', receiptDate = '$date', amount = '$row[amt]',
            totalPrice = '$row[tot]', monthId = '$month'
    WHERE receiptId='$receiptId'  ";
    $result1 = mysqli_query($con, $update_receipt);

    $update_table = "UPDATE tables
    SET    tableStatus = 1
    WHERE tableId = '$row[tableId]' ";
    $result2 = mysqli_query($con, $update_table);


    // เดือนในปัจจุบัน
    $month = date("m");
    // คำนวณจำนวนอาหารที่ถูกสั่งในเดือนนี้และราคารวมทั้งหมดในเดือนนี้ จากทุกๆใบเสร็จในเดือนนี้
    $q_rec = $pdo->prepare("SELECT receiptId, SUM(amount) as amt, SUM(totalPrice) as tot 
                            FROM receipt
                            WHERE monthId = '$month'
                            GROUP BY receiptId ;");
     $q_rec->execute();
     $row_rec = $q_rec->fetch();

     // ทำการอัพเดทค่าในตาราง Income
    $update_income = "UPDATE Income 
                        SET amount = '$row_rec[amt]', totalPrice = '$row_rec[tot]'
                        WHERE monthId = '$month' ";
    $result3 = mysqli_query($con, $update_income);


    //จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม

    if ($result1 && $result2 && $result3) {
        echo "<script type='text/javascript'>";
        echo "alert('Update Succesfully');";
        echo "window.location = 'staff_charged.php'; ";
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('Error back to update again');";
        echo "</script>";
    }
}

?>