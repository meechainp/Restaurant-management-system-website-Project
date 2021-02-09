<?php
//1. เชื่อมต่อ database:
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
$typeId = $_REQUEST["ID"];
//2. query ข้อมูลจากตาราง:
$sql = "SELECT * FROM Type WHERE typeId='$typeId' ";
$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
$row = mysqli_fetch_array($result);
extract($row);
?>
<?php include('h.php');?>
<form  name="type" action="type_form_edit_db.php" method="POST" id="type" class="form-horizontal">
    <input type="hidden" name="typeId" value="<?php echo $typeId; ?>">

          <div class="form-group">
            <div class="col-sm-6" align="left">
            <p> รหัสประเภทของอาหาร </p>
              <input  name="typeId" type="text" required class="form-control" id="typeId"  value="<?php echo $typeId; ?>"placeholder="รหัสประเภทของอาหาร" pattern="^[a-zA-Z0-9]+$" title="เช่น T01, T02" minlength="3"  maxlenght="3" />
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-6" align="left">
            <p> ชื่อประเภทของอาหาร </p>
              <input  name="typeName" type="text" required class="form-control" id="typeName"  value="<?php echo $typeName; ?>"placeholder="ชื่อประเภทของอาหาร"  minlength="1"  />
            </div>
          </div>
          
          <div class="form-group">
            <div class="col-sm-3"> </div>
            <div class="col-sm-5" align="right">
              <button type="submit" class="btn btn-success btn-sm" id="btn"> <span class="glyphicon glyphicon-saved"></span> บันทึก  </button>      
            </div> 
          </div>
        </form>