<?php
      include('h.php');
       error_reporting( error_reporting() & ~E_NOTICE );
                //1. เชื่อมต่อ database:
                include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
                //2. query ข้อมูลจากตาราง tb_admin:
                $query = "SELECT * FROM customer ORDER BY username ASC" or die("Error:" . mysqli_error());
                //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
                $result = mysqli_query($con, $query);
                //4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
                $row_am = mysqli_fetch_assoc($result);
                ?>

<script>    
$(document).ready(function() {
    $('#memberTable').DataTable( {
      "aaSorting" :[[0,'ASC']],
    //"lengthMenu":[[20,50, 100, -1], [20,50, 100,"All"]]
  });
} );
 
  </script>

  <table border="2" class="display table table-bordered" id="memberTable" align="center"  >
  <thead>
    <tr class="info">    
    <th>Username</th>
    <th>Password</th>
    <th>Fname</th>
    <th>Lname</th>
    <th>Tel</th>
    <th>Level</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>
</thead>
  <?php do { ?>
  
    <tr>
      <td><?php echo $row_am['username']; ?></td>
      <td><?php echo $row_am['password']; ?></td>
      <td ><?php echo $row_am['custFName']; ?></td>
      <td ><?php echo $row_am['custLName']; ?></td>
      <td ><?php echo $row_am['custTel']; ?></td>
      <td ><?php echo $row_am['level']; ?></td>

      <td><a href="member.php?act=edit&ID=<?php echo $row_am['username']; ?>" class="btn btn-warning btn-xs"> แก้ไข </a> </td>
      <td><a href="member_del_db.php?ID=<?php echo $row_am['username']; ?>" class='btn btn-danger btn-xs'  onclick="return confirm('ยันยันการลบ')">ลบ</a> </td>
    </tr>

    <?php } while ($row_am =  mysqli_fetch_assoc($result)); ?>
  
    </table> 