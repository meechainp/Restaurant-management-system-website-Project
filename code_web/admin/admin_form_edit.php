<?php
//1. เชื่อมต่อ database:
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
$staffId = $_REQUEST["ID"];
//2. query ข้อมูลจากตาราง:
$sql = "SELECT * FROM staff WHERE staffId='$staffId' ";
$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
$row = mysqli_fetch_array($result);
extract($row);
?>
<?php include('h.php');?>
<form  name="staff" action="admin_form_edit_db.php" method="POST" id="staff" class="form-horizontal">
    <input type="hidden" name="staffId" value="<?php echo $staffId; ?>">

          <div class="form-row">
            <div class="form-group col-md-6">
            <p> รหัสพนักงาน </p>
              <input  name="staffId" type="text" required class="form-control" id="staffId"  value="<?php echo $staffId; ?>"placeholder="รหัสพนักงาน" pattern="^[0-9]+$" title="ตัวเลขเท่านั้น" minlength="10"  />
            </div>
            <div class="form-group col-md-6">
            <p> รหัสผ่าน </p>
              <input  name="password" type="text" required class="form-control" id="password"  value="<?php echo $password; ?>"placeholder="รหัสผ่าน" pattern="^[a-zA-Z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" minlength="6"  />
            </div>
          </div>
          

          <div class="form-row">
            <div class="form-group col-md-6">
            <p> ชื่อ-สกุล </p>
              <input  name="staffName" type="text" required class="form-control" id="staffName"  value="<?php echo $staffName; ?>" placeholder="ชื่อ-สกุล" minleght="3" />
            </div>
            <div class="form-group col-md-6">
            <p> เบอร์โทรศัพท์ </p>
              <input  name="staffTel" type="text" required class="form-control" id="staffTel"  value="<?php echo $staffTel; ?>" placeholder="เบอร์โทรศัพท์ number" minleght="10"  pattern="^[0-9]+$"title="ไม่ต้องใส่ขีด - " />
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
            <p> level </p>
              <input  name="level" type="text" required class="form-control" id="level"  value="<?php echo $level; ?>"placeholder="level" pattern="^[1-3]+$" minlength="1" title="3=Admin, 2=Staff, 1=Chef"/>
            </div>
          </div>

          <div class="form-group">
          <div class="col-sm-12">
            <p> ที่อยู่ </p>
             <textarea  name="staffAddress" type="text" required class="form-control" id="staffAddress"  placeholder="ที่อยู่" maxlength="300" rows="5" cols="60">
             <?php echo $staffAddress; ?></textarea>
          </div>
        </div>
          
          <div class="form-group">
            <div class="col-sm-3"> </div>
            <div class="col-sm-5" align="right">
              <button type="submit" class="btn btn-success btn-sm" id="btn"> <span class="glyphicon glyphicon-saved"></span> บันทึก  </button>      
            </div> 
          </div>
        </form>