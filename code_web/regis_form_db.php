<?php
include('condb.php');

$username = $_POST['username'];
$password = $_POST['password'];
$custFname = $_POST['custFname'];
$custLname = $_POST['custLname'];
$custTel = $_POST['custTel'];

$check = "
	SELECT  * 
	FROM customer  
	WHERE username = '$username' 
	";
    $result1 = mysqli_query($con, $check) or die(mysqli_error());
    $num=mysqli_num_rows($result1);
 
    if($num > 0)
    {
    echo "<script>";
    echo "alert(' username นี้ถูกใช้ไปแล้ว กรุณาใช้ชื่ออื่น!');";
    echo "window.history.back();";
    echo "</script>";
    }else{

$sql ="INSERT INTO customer
    
    (username,  password, custFname, custLname, custTel, level) 

    VALUES 

    ('$username', '$password', '$custFname', '$custLname', '$custTel', 0)";
    
    $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
    mysqli_close($con);
    
    if($result){
      echo "<script>";
      echo "alert('Register Succesfuly');";
      echo "window.location ='login_member_index.php'; ";
      echo "</script>";
    } else {
      
      echo "<script>";
      echo "alert('ERROR!');";
      echo "window.location ='index_regis.html'; ";
      echo "</script>";
    }
  }
?>