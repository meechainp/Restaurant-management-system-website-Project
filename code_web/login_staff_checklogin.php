<?php 
session_start();
        if(isset($_POST['username'])){
                  include("condb.php");
                  $username = $_POST['username'];
                  $password = $_POST['password'];
 
                  $sql="SELECT * FROM Staff 
                  WHERE  staffId='".$username."' 
                  AND  password='".$password."' ";
                  $result = mysqli_query($con,$sql);
				
                  if(mysqli_num_rows($result)==1){
                      $row = mysqli_fetch_array($result);
 
                      $_SESSION["staffId"] = $row["staffId"];
                      $_SESSION["level"] = $row["level"];
                      $_SESSION["tableId"] = $row["TableId"];
                      $_SESSION["staffName"] = $row["staffName"];
                      $_SESSION["staffTel"] = $row["staffTel"];
                      $_SESSION["staffAddress"] = $row["staffAddress"];

                      if($_SESSION["level"]==3){ //admin
 
                        Header("Location: admin/index.php");
                      }
                     if ($_SESSION["level"]==1){ //Staff
 
                        Header("Location: staff_order.php");
                      }
                      if ($_SESSION["level"]==2){ //chef
 
                        Header("Location: chef_order.php");
                      }
                  }else{
                    echo "<script>";
                        echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
                        echo "window.history.back()";
                    echo "</script>";
 
                  }
        }else{
 
             Header("Location: login_index.php"); //user & password incorrect back to login again
 
        }
?>