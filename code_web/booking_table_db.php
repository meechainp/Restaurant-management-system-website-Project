<meta charset="UTF-8">
<?php
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
SESSION_start();
$username = $_SESSION['username'];

//รับค่าไฟล์จากฟอร์ม
$custCount = $_POST['custCount'];
$tableId = $_POST['tableId'];

//Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
date_default_timezone_set('Asia/Bangkok');
//สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลด
$date = date("Y-m-d H:i:s");

// เพิ่มไฟล์เข้าไปในตาราง uploadfile

$check = "
	SELECT  booking_table.tableId
	FROM booking_table, tables  
	WHERE username = '$username' AND booking_table.tableId = tables.tableId AND tableStatus = 0 
	";
$result1 = mysqli_query($con, $check) or die(mysqli_error());
$num = mysqli_num_rows($result1);

if ($num > 0) {
	echo "<script>";
	echo "alert(' คุณได้ทำการจองโต๊ะไปแล้ว!');";
	echo "window.history.back();";
	echo "</script>";
} else {

	$sql = "INSERT INTO Booking_table
		(tableId, username, dateBookingTable, custCount	)
		VALUES
    ('$tableId', '$username', '$date', '$custCount')";

	//update tableStatus ในตาราง tables
	$update = "UPDATE tables SET tableStatus = 0 WHERE tableId = '$tableId' ";
	$result_up = mysqli_query($con, $update) or die("Error in query: $update " . mysqli_error());

	$result = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error());

	mysqli_close($con);
	// javascript แสดงการ upload file


	if ($result) {
		echo "<script type='text/javascript'>";
		echo "alert('Add Succesfuly');";
		echo "window.location = 'index.php'; ";
		echo "</script>";
	} else {
		echo "<script type='text/javascript'>";
		echo "alert('Error back to upload again');";
		echo "window.location = 'booking_table.php'; ";
		echo "</script>";
	}
}
?>