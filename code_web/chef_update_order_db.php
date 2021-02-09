<meta charset="UTF-8">
<?php
//1. เชื่อมต่อ database: 
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//สร้างตัวแปรสำหรับรับค่า member_id จากไฟล์แสดงข้อมูล
$orderId = $_REQUEST["ID"];

//ลบข้อมูลออกจาก database ตาม member_id ที่ส่งมา
$check = "
	SELECT  * 
	FROM cart  
	WHERE orderId = '$orderId' AND cartStatus = 'Doing'
	";
    $result1 = mysqli_query($con, $check) or die(mysqli_error());
    $num=mysqli_num_rows($result1);
 
    if($num > 0)
    {
    echo "<script>";
    echo "alert(' ยังมีรายการอาหารที่ยังทำไม่เสร็จ!');";
    echo "window.history.back();";
    echo "</script>";
    }else{

    $sql = "UPDATE orders, kitchen
    SET    orders.orderStatus = 'Done', kitchen.kitchenStatus = 'Done'
    WHERE orders.orderId='$orderId' AND kitchen.orderId='$orderId' ";
    $result = mysqli_query($con, $sql)
    or die ("Error in query: $sql " . mysqli_error());
    


//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
  
  if($result){
  echo "<script type='text/javascript'>";
  echo "alert('Update Succesfully');";
  echo "window.location = 'chef_order.php'; ";
  echo "</script>";
  }
  else{
  echo "<script type='text/javascript'>";
  echo "alert('Error back to update again');";
  echo "</script>";
}
    }

?>

