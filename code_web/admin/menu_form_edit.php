<?php
//1. เชื่อมต่อ database:
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
$menuId = $_GET["ID"];
//2. query ข้อมูลจากตาราง:
$sql = "SELECT menu.*,type.typeName
FROM menu 
INNER JOIN type  ON menu.typeId = type.typeId
WHERE menu.menuId = '$menuId'
ORDER BY menu.menuId asc";
$result2 = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
$row = mysqli_fetch_array($result2);
extract($row);

//2. query ข้อมูลจากตาราง 
$query = "SELECT * FROM type ORDER BY typeId asc" or die("Error:" . mysqli_error());
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
$result = mysqli_query($con, $query);
//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
?>
<div class="container">
  <div class="row">
      <form  name="menu" action="menu_form_edit_db.php" method="POST" enctype="multipart/form-data"  class="form-horizontal">

        <div class="form-group">
          <div class="form-group col-md-6">
            <p> ประเภทสินค้า </p>
            <select name="typeId" class="form-control" required>
              <option value="<?php echo $row["typeId"];?>">
                <?php echo $row["typeName"]; ?>
              </option>
              <!--<option value="typeId"></option>-->
              <?php foreach($result as $results){?>
              <option value="<?php echo $results["typeId"];?>">
                <?php echo $results["typeName"]; ?>
              </option>
              <?php } ?>
            </select>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <p> ชื่อภาษาไทย</p>
            <input type="text"  name="menuTHname" class="form-control" required placeholder="ชื่อภาษาไทย"  value="<?php echo $menuTHname; ?>">
          </div>

          <div class="form-group col-md-6">
            <p> ชื่อภาษาอังกฤษ</p>
            <input type="text"  name="menuENname" class="form-control" required placeholder="ชื่อภาษาอังกฤษ"  value="<?php echo $menuENname; ?>">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <p> ราคาสินค้า</p>
            <input type="text"  name="menuPrice" class="form-control" required placeholder="ราคาสินค้า"  value="<?php echo $menuPrice; ?>">
          </div>

          <div class="form-group col-md-6">
            <p> สถานะสินค้า</p>
            <input type="text"  name="menuStatus" class="form-control" required placeholder="สถานะสินค้า"  value="<?php echo $menuStatus; ?>">
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-12">
            <p> รายละเอียดสินค้า </p>
             <textarea  name="menuDesc" rows="5" cols="60"><?php echo $menuDesc; ?>
             </textarea>
          </div>
        </div>
        
            <div class="form-group">
          <div class="col-sm-12">
            <p> ภาพสินค้า </p>
            <img src="menuImg/<?php echo $row['menuImg'];?>" width="100px">
            <br>
            <br>
            <input type="file" name="menuImg" id="menuImg" class="form-control" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
             <input type="hidden" name="menuId" value="<?php echo $menuId; ?>" />
             <input type="hidden" name="img2" value="<?php echo $menuImg; ?>" />
            <button type="submit" class="btn btn-success" name="btnadd"> บันทึก </button>
            
          </div>
        </div>
      </form>
    </div>
  </div>