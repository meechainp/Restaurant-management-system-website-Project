<?php include('h.php');?>
<div class="container">
  <div class="row">
    <form  name="customer" action="member_form_add_db.php" method="POST" enctype="multipart/form-data" id="customer" class="form-horizontal">

          <div class="form-row">
            <div class="form-group col-md-6">
            <p> username </p>
              <input  name="username" type="text" required class="form-control" id="username" placeholder="username" pattern="^[a-zA-Z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" minlength="6"  />
            </div>
            <div class="form-group col-md-6">
            <p> รหัสผ่าน </p>
              <input  name="password" type="text" required class="form-control" id="password" placeholder="รหัสผ่าน" pattern="^[a-zA-Z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" minlength="6"  />
            </div>
          </div>

          <div class="form-row">
            <div cclass="form-group col-md-6">
            <p> ชื่อ </p>
              <input  name="custFname" type="text" required class="form-control" id="custFname" placeholder="ชื่อ"  minlength="1" />
            </div>
            <div class="form-group col-md-6">
            <p> สกุล </p>
              <input  name="custLname" type="text" required class="form-control" id="custLname" placeholder="สกุล"  minlength="1" />
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
            <p> เบอร์โทรศัพท์ </p>
              <input  name="custTel" type="text" required class="form-control" id="custTel" placeholder="เบอร์โทรศัพท์" pattern="^[0-9]+$" title="ไม่ต้องใส่ขีด - " minlength="3"  />
            </div>
          </div>
          

          <div class="form-group">
            <div class="col-sm-3"> </div>
            <div class="col-sm-5" align="right">
              <button type="submit" class="btn btn-success btn-sm" id="btn"> <span class="glyphicon glyphicon-saved"></span> บันทึก  </button>      
            </div> 
          </div>
    </form>
  </div>
</div>