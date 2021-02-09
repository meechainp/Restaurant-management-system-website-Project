<?php
      include('h.php');
       error_reporting( error_reporting() & ~E_NOTICE );
                //1. เชื่อมต่อ database:
                include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
                //2. query ข้อมูลจากตาราง tb_admin:
                $query = "SELECT * FROM Staff ORDER BY staffId ASC" or die("Error:" . mysqli_error());
                //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
                $result = mysqli_query($con, $query);
                //4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
                $row_am = mysqli_fetch_assoc($result);
                ?>

<script>    
$(document).ready(function() {
    $('#adminTable').DataTable( {
      "aaSorting" :[[0,'ASC']],
    //"lengthMenu":[[20,50, 100, -1], [20,50, 100,"All"]]
  });
} );
 
  </script>

  <table border="2" class="display table table-bordered" id="adminTable" align="center"  >
  <thead>
    <tr class="info">    
    <th>Id</th>
    <th>Password</th>
    <th>Level</th>
    <th>Name</th>
    <th>Tel</th>
    <th>Address</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>
</thead>
  <?php do { ?>
  
    <tr>
      <td><?php echo $row_am['staffId']; ?></td>
      <td><?php echo $row_am['password']; ?></td>
      <td ><?php echo $row_am['level']; ?></td>
      <td ><?php echo $row_am['staffName']; ?></td>
      <td ><?php echo $row_am['staffTel']; ?></td>
      <td ><?php echo $row_am['staffAddress']; ?></td>
      
      <td><a href="admin.php?act=edit&ID=<?php echo $row_am['staffId']; ?>" class="btn btn-warning btn-xs"> แก้ไข </a> </td>
      <td><a href="admin_del_db.php?ID=<?php echo $row_am['staffId']; ?>" class='btn btn-danger btn-xs'  onclick="return confirm('ยันยันการลบ')">ลบ</a> </td>
    </tr>

    <?php } while ($row_am =  mysqli_fetch_assoc($result)); ?>
  
    </table> 