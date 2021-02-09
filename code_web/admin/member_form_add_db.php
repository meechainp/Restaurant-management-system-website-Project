<?php
include('condb.php');

$username = $_POST['username'];
$password = $_POST['password'];
$Fname = $_POST['custFname'];
$Lname = $_POST['custLname'];
$Tel = $_POST['custTel'];

$check = "
	SELECT  username 
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
    
    (username, password, custFname, custLname, custTel, level) 

    VALUES 

    ('$username', '$password', '$Fname', '$Lname', '$Tel', 0)";
    
    $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
    mysqli_close($con);
    }
    if($result){
      echo "<script>";
      echo "alert('Add Succesfuly');";
      echo "window.location ='member.php'; ";
      echo "</script>";
    } else {
      
      echo "<script>";
      echo "alert('ERROR!');";
      echo "window.location ='member.php'; ";
      echo "</script>";
    }
?>