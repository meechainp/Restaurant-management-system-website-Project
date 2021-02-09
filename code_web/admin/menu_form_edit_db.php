<meta charset="UTF-8">
<?php
//1. เชื่อมต่อ database: 
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
date_default_timezone_set('Asia/Bangkok');
//สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลด
$date1 = date("Ymd_His");
//สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
$numrand = (mt_rand());

//สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
$menuId = $_POST["menuId"];
$typeId = $_POST["typeId"];
$menuTHname = $_POST["menuTHname"];
$menuENname = $_POST["menuENname"];
$menuPrice = $_POST["menuPrice"];
$menuStatus = $_POST["menuStatus"];
$menuDesc = $_POST["menuDesc"];
$menuImg = (isset($_POST['menuImg']) ? $_POST['menuImg'] : '');
$img2 = $_POST['img2'];
$upload = $_FILES['menuImg']['name'];
if ($upload != '') {

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
} else {
	$newname = $img2;
}

//ทำการปรับปรุงข้อมูลที่จะแก้ไขลงใน database 

$sql = "UPDATE menu SET  
	typeId='$typeId', 
	menuTHname='$menuTHname',
    menuENname = '$menuENname',
    menuPrice = '$menuPrice',
    menuStatus = '$menuStatus',
    menuDesc = '$menuDesc',
	menuImg='$newname'
	WHERE menuId='$menuId' ";

$result = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error());

mysqli_close($con); //ปิดการเชื่อมต่อ database 

//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม

if ($result) {
	echo "<script type='text/javascript'>";
	echo "alert('Update Succesfully');";
	echo "window.location = 'menu.php'; ";
	echo "</script>";
} else {
	echo "<script type='text/javascript'>";
	echo "alert('Error back to Update again');";
	echo "</script>";
}
?>