<?php
//1. เชื่อมต่อ database:
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//2. query ข้อมูลจากตาราง tb_member:
$query = "SELECT * FROM type ORDER BY typeId asc" or die("Error:" . mysqli_error());
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
$result = mysqli_query($con, $query);
//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
?>
<div class="container">
  <div class="row">
      <form  name="menu" action="menu_form_add_db.php" method="POST" enctype="multipart/form-data"  id="menu" class="form-horizontal">
        
        <div class="form-row">
            <div  class="form-group col-md-6">
            <p> รหัสสินค้า </p>
              <input  name="menuId" type="text" required class="form-control" id="menuId" placeholder="รหัสสินค้า" pattern="^[a-zA-Z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" minlength="6" maxlength="6"  />
            </div>

          <div class="form-group col-md-6">
            <p> ประเภทสินค้า </p>
            <select name="typeId" class="form-control" required>
              <option value="typeId">ประเภทสินค้า</option>
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
          <p> ชื่อภาษาไทย </p>
            <input  name="menuTHname" type="text" required class="form-control" id="menuTHname" placeholder="ชื่อภาษาไทย"  minlength="1" maxlength="200" />
          </div>
          <div class="form-group col-md-6">
          <p> ชื่อภาษาอังกฤษ </p>
            <input  name="menuENname" type="text" required class="form-control" id="menuENname" placeholder="ชื่อภาษาอังกฤษ"  minlength="1" maxlength="200"  />
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
          <p> ราคาสินค้า </p>
            <input  name="menuPrice" type="float" required class="form-control" id="menuPrice" placeholder="ราคาสินค้า"  />
          </div>

          <div class="form-group col-md-6">
          <p> สถานะสินค้า </p>
            <input  name="menuStatus" type="text" required class="form-control" id="menuStatus" placeholder="สถานะสินค้า" pattern="^[0-1]+$" title="0=ไม่มี, 1=มี" minlength="1" maxlength="1"  />
          </div>
        </div>


        <div class="form-group">
          <div class="col-sm-12">
            <p> รายละเอียดสินค้า </p>
             <textarea  name="menuDesc" type="text" required class="form-control" id="menuDesc" placeholder="รายละเอียดสินค้า" maxlength="300" rows="5" cols="60"></textarea>
          </div>
        </div>


        <div class="form-group">
          <div class="col-sm-12">
            <p> ภาพสินค้า </p>
            <input type="file" name="menuImg" id="menuImg" class="form-control" />
          </div>
        </div>


        <div class="form-group">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-success" name="btnadd"> บันทึก </button>
            
          </div>
        </div>
      </form>
    </div>
  </div>