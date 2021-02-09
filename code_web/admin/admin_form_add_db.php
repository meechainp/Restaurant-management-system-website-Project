<?php
include('condb.php');

$staffId = $_POST['staffId'];
$password = $_POST['password'];
$level = $_POST['level'];
$staffName = $_POST['staffName'];
$staffTel = $_POST['staffTel'];
$staffAddress = $_POST['staffAddress'];

$check = "
	SELECT  staffId 
	FROM staff  
	WHERE staffId = '$staffId' 
	";
    $result1 = mysqli_query($con, $check) or die(mysqli_error());
    $num=mysqli_num_rows($result1);
 
    if($num > 0)
    {
    echo "<script>";
    echo "alert(' ID นี้ถูกใช้ไปแล้ว กรุณาใช้ชื่ออื่น!');";
    echo "window.history.back();";
    echo "</script>";
    }else{

$sql ="INSERT INTO staff
    
    (staffId, password, level, staffName, staffTel, staffAddress) 

    VALUES 

    ('$staffId', '$password', '$level', '$staffName', '$staffTel', '$staffAddress')";
    
    $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
    mysqli_close($con);
    }
    if($result){
      echo "<script>";
      echo "alert('Add Succesfuly');";
      echo "window.location ='admin.php'; ";
      echo "</script>";
    } else {
      
      echo "<script>";
      echo "alert('ERROR!');";
      echo "window.location ='admin.php'; ";
      echo "</script>";
    }
?>