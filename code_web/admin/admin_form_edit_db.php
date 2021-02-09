<meta charset="UTF-8">
<?php
//1. เชื่อมต่อ database: 
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี

//สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
  $staffId = $_REQUEST["staffId"];
  $password = $_REQUEST["password"];
  $level = $_REQUEST["level"];
  $staffName = $_REQUEST["staffName"];
  $staffTel = $_REQUEST["staffTel"];
  $staffAddress = $_REQUEST["staffAddress"];

//ทำการปรับปรุงข้อมูลที่จะแก้ไขลงใน database 
  
  $sql = "UPDATE staff SET  
      staffId = '$staffId',
      password='$password' , 
      level='$level' , 
      staffName = '$staffName',
      staffTel = '$staffTel',
      staffAddress = '$staffAddress'
      WHERE staffId='$staffId' ";

$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
mysqli_close($con); //ปิดการเชื่อมต่อ database 

//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
  
  if($result){
  echo "<script type='text/javascript'>";
  echo "alert('Update');";
  echo "window.location = 'admin.php'; ";
  echo "</script>";
  }
  else{
  echo "<script type='text/javascript'>";
  echo "alert('Error back to Update again');";
  echo "</script>";
}
?>