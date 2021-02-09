<?php
//1. เชื่อมต่อ database:
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
$tableId = $_REQUEST["ID"];
//2. query ข้อมูลจากตาราง:
$sql = "SELECT * FROM tables WHERE tableId='$tableId' ";
$result = mysqli_query($con, $sql) or die("Error in query: $sql " . mysqli_error());
$row = mysqli_fetch_array($result);
extract($row);
?>
<?php include('h.php'); ?>
<form name="tables" action="table_form_edit_db.php" method="POST" id="tables" class="form-horizontal">
  <input type="hidden" name="tableId" value="<?php echo $tableId; ?>">

  <div class="form-group">
    <div class="col-sm-6" align="left">
      <p> รหัสโต๊ะ </p>
      <input name="tableId" type="text" required class="form-control" id="tableId" value="<?php echo $tableId; ?>" placeholder="รหัสโต๊ะ" pattern="^[a-zA-Z0-9]+$" title="เช่น T001, T002" minlength="4" maxlength="4" />
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-6" align="left">
      <p> รหัสพนักงาน </p>
      <input name="staffId" type="text" required class="form-control" id="staffId" value="<?php echo $staffId; ?>" placeholder="รหัสพนักงาน" />
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-6" align="left">
      <p> ชื่อโต๊ะ </p>
      <input name="tableName" type="text" required class="form-control" id="tableName" value="<?php echo $tableName; ?>" placeholder="ชื่อโต๊ะ" pattern="^[a-zA-Z0-9]+$" title="เช่น 1, 2, 3" minlength="1" />
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-6" align="left">
      <p> สถานะโต๊ะ </p>
      <input name="tableStatus" type="text" required class="form-control" id="tableStatus" value="<?php echo $tableStatus; ?>" placeholder="สถานะโต๊ะ" pattern="^[0-1]+$" title="0=ไม่ว่าง, 1=ว่าง" minlength="1" maxlength="1" />
    </div>
  </div>


  <div class="form-group">
    <div class="col-sm-3"> </div>
    <div class="col-sm-5" align="right">
      <button type="submit" class="btn btn-success btn-sm" id="btn"> <span class="glyphicon glyphicon-saved"></span> บันทึก </button>
    </div>
  </div>
</form>