<meta charset="UTF-8">
<?php
include('condb.php');
$receiptId = $_REQUEST["ID"];


$check = "
	SELECT  *
	FROM orders
	WHERE receiptId = '$receiptId' AND orderStatus != 'Served'
	";
$result1 = mysqli_query($con, $check) or die(mysqli_error());
$num = mysqli_num_rows($result1);

if ($num > 0) {
    echo "<script>";
    echo "alert(' ยังมีรายการอาหารที่ยังทำไม่เสร็จหรือยังไม่ได้นำมาเสิร์ฟ! โปรดรอซักครู่ครับ');";
    echo "window.history.back();";
    echo "</script>";
} else {

    $sql = "UPDATE receipt 
    SET    receiptStatus = 'Ready' 
    WHERE receiptId='$receiptId' ";
    $result = mysqli_query($con, $sql)
        or die("Error in query: $sql " . mysqli_error());



    //จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม

    if ($result) {
        echo "<script type='text/javascript'>";
        echo "alert('Update Succesfully');";
        echo "window.location = 'member_myorder.php'; ";
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('Error back to update again');";
        echo "</script>";
    }
}

?>