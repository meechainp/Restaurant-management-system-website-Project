<?php 
session_start();
        if(isset($_POST['username'])){
                  include("condb.php");
                  $username = $_POST['username'];
                  $password = $_POST['password'];
 
                  $sql="SELECT * FROM customer 
                  WHERE  username='".$username."' 
                  AND  password='".$password."' ";
                  $result = mysqli_query($con,$sql);
				
                  if(mysqli_num_rows($result)==1){
                      $row = mysqli_fetch_array($result);

                      $_SESSION["username"] = $row["username"];
                      $_SESSION["password"] = $row["password"];
                      $_SESSION["custFname"] = $row["custLname"];
                      $_SESSION["custLname"] = $row["custLname"];
                      $_SESSION["custTel"] = $row["custTel"];
                      $_SESSION["level"] = $row["level"];

                      if($_SESSION["level"]==0){ //member
 
                        Header("Location:index.php");
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