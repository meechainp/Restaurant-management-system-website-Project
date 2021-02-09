<?php
      include('h.php');
       error_reporting( error_reporting() & ~E_NOTICE );
                //1. เชื่อมต่อ database:
                include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
                //2. query ข้อมูลจากตาราง tb_admin:
                $query = "
                SELECT * FROM menu  
                INNER JOIN type ON menu.typeId=type.typeId
                ORDER BY menu.menuId DESC" or die("Error:" . mysqli_error());
                //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
                $result = mysqli_query($con, $query);
                //4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
                $row_am = mysqli_fetch_assoc($result);
                ?>

<script>    
$(document).ready(function() {
    $('#menuTable').DataTable( {
      "aaSorting" :[[0,'ASC']],
    //"lengthMenu":[[20,50, 100, -1], [20,50, 100,"All"]]
  });
} );
 
  </script>

  <table border="2" class="display table table-bordered" id="menuTable" align="center"  >
  <thead>
    <tr class="info">    
    <th>menuId</th>
    <th>typeId</th>
    <th>THname</th>
    <th>ENname</th>
    <th>Price</th>
    <th>Status</th>
    <th>Desc</th>
    <th>Image</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>
</thead>
  <?php do { ?>
  
    <tr>
      <td><?php echo $row_am['menuId']; ?></td>
      <td><?php echo $row_am['typeId']; ?></td>
      <td ><?php echo $row_am['menuTHname']; ?></td>
      <td ><?php echo $row_am['menuENname']; ?></td>
      <td ><?php echo $row_am['menuPrice']; ?></td>
      <td ><?php echo $row_am['menuStatus']; ?></td>
      <td ><?php echo $row_am['menuDesc']; ?></td>
      <td ><?php echo "<img src='menuImg/".$row_am["menuImg"]."' width='50'>"; ?></td>
      
     
      <td><a href="menu.php?act=edit&ID=<?php echo $row_am['menuId']; ?>" class="btn btn-warning btn-xs"> แก้ไข </a> </td>
      <td><a href="menu_del_db.php?ID=<?php echo $row_am['menuId']; ?>" class='btn btn-danger btn-xs'  onclick="return confirm('ยันยันการลบ')">ลบ</a> </td>
    </tr>

    <?php } while ($row_am =  mysqli_fetch_assoc($result)); ?>
  
    </table> 