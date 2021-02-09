<html>
<body>
<center>
<?php

    $linkDatabase = mysqli_connect("localhost","root");

    if($linkDatabase){
        echo "<br><br><br>";
        echo "<h2> >> สร้างใบเสร็จของคุณสำเร็จ << </h2><br>";
        echo "<br><br><br><br><br><br>";
        include("goto.php");

        echo "<br><br><br><br><br><br><br><br><br>";
        echo "<h3> หากระบบไม่ทำงาน >>> <a href=http://localhost/shop/Bill/interface.php> คลิกที่นี่ !!!  <<< </a> </h3><br>"; //FIX THIS *****

    }
    else{
        echo "<br><br><h2> >> สร้างใบเสร็จของคุณไม่สำเร็จ โปรดลองใหม่อีกครั้ง << </h2><br>";
        echo "<br><br><br><br><br><br>";
        echo "<a href=http://localhost/shop/Bill/> กลับสู่หน้าแก้ไขข้อมูล </a> <br>"; //FIX THIS *****
    }
?>
</center>
</body>
</html>
