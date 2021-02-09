<meta charset="UTF-8">
<?php
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี

//รับค่าไฟล์จากฟอร์ม
$menuId = $_POST['menuId'];
$typeId = $_POST['typeId'];
$THname = $_POST['menuTHname'];
$ENname = $_POST['menuENname'];
$price = $_POST['menuPrice'];
$status = $_POST['menuStatus'];
$desc = $_POST['menuDesc'];
$menuImg = $_REQUEST['menuImg'];

$check = "
	SELECT  menuId 
	FROM menu  
	WHERE menuId = '$menuId' 
	";
$result1 = mysqli_query($con, $check) or die(mysqli_error());
$num = mysqli_num_rows($result1);

if ($num > 0) {
	echo "<script>";
	echo "alert(' ID นี้ถูกใช้ไปแล้ว กรุณาใช้ชื่ออื่น!');";
	echo "window.history.back();";
	echo "</script>";
} else {

	//Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
	date_default_timezone_set('Asia/Bangkok');
	//สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลด
	$date1 = date("Ymd");
	//สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
	$numrand = (mt_rand());

	//img
	$upload = $_FILES['menuImg'];
	if ($upload <> '') {

		//โฟลเดอร์ที่เก็บไฟล์
		$path = "menuImg/";

		//ตัวขื่อกับนามสกุลภาพออกจากกัน
		$type = strrchr($_FILES['menuImg']['name'], ".");

		//ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
		$newname = $_FILES['menuImg']['name'];
		$path_copy = $path . $newname;
		$path_link = "menuImg/" . $newname;

		//คัดลอกไฟล์ไปยังโฟลเดอร์
		move_uploaded_file($_FILES['menuImg']['tmp_name'], $path_copy);
	}

	// เพิ่มไฟล์เข้าไปในตาราง uploadfile

	$sql = "INSERT INTO menu
		(menuId, typeId, menuTHname, menuENname, menuPrice, menuStatus, menuDesc, menuImg, datesave	)
		VALUES
    ('$menuId', '$typeId', '$THname', '$ENname', '$price', '$status', '$desc', '$newname', '$date1')";

	$result = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error());

	mysqli_close($con);
	// javascript แสดงการ upload file

}
if ($result) {
	echo "<script type='text/javascript'>";
	echo "alert('Add Succesfuly');";
	echo "window.location = 'menu.php'; ";
	echo "</script>";
} else {
	echo "<script type='text/javascript'>";
	echo "alert('Error back to upload again');";
	echo "window.location = 'menu.php'; ";
	echo "</script>";
}
?>