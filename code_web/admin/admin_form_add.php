<?php include('h.php');?>
<form  name="staff" action="admin_form_add_db.php" method="POST" id="staff" class="form-horizontal">

          <div class="form-row">
            <div class="form-group col-md-6">
            <p> รหัสพนักงาน </p>
              <input  name="staffId" type="text" required class="form-control" id="staffId" placeholder="รหัสพนักงาน" pattern="^[0-9]+$" title="ตัวเลขเท่านั้น" minlength="10"  />
            </div>
            <div class="form-group col-md-6">
            <p> รหัสผ่าน </p>
              <input  name="password" type="text" required class="form-control" id="password" placeholder="รหัสผ่าน" pattern="^[a-zA-Z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" minlength="6"  />
            </div>
          </div>
        

          <div class="form-row">
            <div class="form-group col-md-6">
            <p> ชื่อ-สกุล </p>
              <input  name="staffName" type="text" required class="form-control" id="StaffName" placeholder="ชื่อ-สกุล" />
            </div>
            <div class="form-group col-md-6">
            <p> เบอร์โทรศัพท์ </p>
              <input  name="staffTel" type="text" required class="form-control" id="staffTel" placeholder="เบอร์โทรศัพท์" pattern="^[0-9]+$" title="ไม่ต้องใส่ขีด" minlength="10"  />
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
            <p> level </p>
              <input  name="level" type="text" required class="form-control" id="level" placeholder="level" pattern="^[1-3]+$" title="3=Admin, 2=Staff, 1=Chef" minlength="1" />
            </div>
          </div>

          <div class="form-group">
          <div class="col-sm-12">
            <p> ที่อยู่ </p>
             <textarea  name="staffAddress" type="text" required class="form-control" id="staffAddress" placeholder="ที่อยู่" maxlength="300" rows="5" cols="60"></textarea>
          </div>
        </div>
          
          <div class="form-group">
            <div class="col-sm-3"> </div>
            <div class="col-sm-5" align="right">
              <button type="submit" class="btn btn-success btn-sm" id="btn"> <span class="glyphicon glyphicon-saved"></span> บันทึก  </button>      
            </div> 
          </div>
        </form>