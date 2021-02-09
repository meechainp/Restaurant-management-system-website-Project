<?php include('h.php'); ?>
<form name="tables" action="table_form_add_db.php" method="POST" id="tables" class="form-horizontal">
  <div class="form-group">
    <div class="col-sm-6" align="left">
      <p> รหัสโต๊ะ </p>
      <input name="tableId" type="text" required class="form-control" id="tableId" placeholder="รหัสโต๊ะ" pattern="^[a-zA-Z0-9]+$" title="เช่น T01, T02" minlength="4" maxlength="4" />
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-6" align="left">
      <p> รหัสพนักงาน </p>
      <input name="staffId" type="text" required class="form-control" id="staffId" placeholder="รหัสพนักงาน" />
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-6" align="left">
      <p> ชื่อโต๊ะ </p>
      <input name="tableName" type="text" required class="form-control" id="tableName" placeholder="ชื่อโต๊ะ" pattern="^[a-zA-Z0-9]+$" title="เช่น 1, 2, 3" minlength="1" />
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-6" align="left">
      <p> สถานะโต๊ะ </p>
      <input name="tableStatus" type="text" required class="form-control" id="tableStatus" placeholder="สถานะโต๊ะ" pattern="^[0-1]+$" title="0=ไม่ว่าง , 1=ว่าง" minlength="1" maxlength="1" />
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-3"> </div>
    <div class="col-sm-5" align="right">
      <button type="submit" class="btn btn-success btn-sm" id="btn"> <span class="glyphicon glyphicon-saved"></span> บันทึก </button>
    </div>
  </div>
</form>