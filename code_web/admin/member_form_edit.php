<?php
//1. เชื่อมต่อ database:
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
$username = $_REQUEST["ID"];
//2. query ข้อมูลจากตาราง:
$sql = "SELECT * FROM customer WHERE username='$username' ";
$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
$row = mysqli_fetch_array($result);
extract($row);
?>
<?php include('h.php');?>
<form  name="customer" action="member_form_edit_db.php" method="POST" id="customer" class="form-horizontal">
    <input type="hidden" name="username" value="<?php echo $username; ?>">

          <div class="form-row">
            <div class="col-sm-6" align="left">
            <p> username </p>
              <input  name="username" type="text" required class="form-control" id="username"  value="<?php echo $username; ?>"placeholder="username" pattern="^[a-zA-Z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" minlength="6"  />
            </div>
            <div class="col-sm-6" align="left">
            <p> รหัสผ่าน </p>
              <input  name="password" type="text" required class="form-control" id="password"  value="<?php echo $password; ?>"placeholder="รหัสผ่าน" pattern="^[a-zA-Z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" minlength="6"  />
            </div>
          </div>
          
          <div class="form-row">
            <div class="col-sm-6" align="left">
            <p> ชื่อ </p>
              <input  name="custFName" type="text" required class="form-control" id="custFName"  value="<?php echo $custFName; ?>"placeholder="ชื่อ" minlength="1" />
            </div>
            <div class="col-sm-6" align="left">
            <p> สกุล </p>
              <input  name="custLName" type="text" required class="form-control" id="custLName"  value="<?php echo $custLName; ?>" placeholder="สกุล" minleght="1" />
            </div>
          </div>

          <div class="form-row">
            <div class="col-sm-6" align="left">
            <p> เบอร์โทรศัพท์ </p>
              <input  name="custTel" type="text" required class="form-control" id="custTel"  value="<?php echo $custTel; ?>" placeholder="Tel number" minleght="3" pattern="^[0-9]+$"/>
            </div>
          </div>
          
          <div class="form-group">
            <div class="col-sm-3"> </div>
            <div class="col-sm-5" align="right">
              <button type="submit" class="btn btn-success btn-sm" id="btn"> <span class="glyphicon glyphicon-saved"></span> บันทึก  </button>      
            </div> 
          </div>
        </form>