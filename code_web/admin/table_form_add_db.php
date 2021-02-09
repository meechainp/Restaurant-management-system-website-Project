<?php
include('condb.php');

$id = $_POST['tableId'];
$staffId = $_POST['staffId'];
$name = $_POST['tableName'];
$status = $_POST['tableStatus'];

$check = "
	SELECT  tableId 
	FROM tables  
	WHERE tableId = '$id' 
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

$sql ="INSERT INTO tables
    
    (tableId, staffId, tableName, tableStatus) 

    VALUES 

    ('$id', '$staffId', '$name', '$status')";
    
    $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
    mysqli_close($con);
    }
    if($result){
      echo "<script>";
      echo "alert('Add Succesfuly');";
      echo "window.location ='table.php'; ";
      echo "</script>";
    } else {
      
      echo "<script>";
      echo "alert('ERROR!');";
      echo "window.location ='table.php'; ";
      echo "</script>";
    }
?>