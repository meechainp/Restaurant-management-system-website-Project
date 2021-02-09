<!DOCTYPE html>
<html lang="en">

<head>

<?php include('regis_head.php');
include "bar.php";
?>
</head>

<form  name="admin" action="admin_form_add_db.php" method="POST" id="admin" class="form-horizontal">
          <div class="form-group">
            <div class="col-sm-6" align="left">
              <input  name="staffId" type="text" required class="form-control" id="staffId" placeholder="staffId" pattern="^[a-zA-Z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" minlength="2"  />
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-6" align="left">
              <input  name="username" type="text" required class="form-control" id="username" placeholder="Username" pattern="^[a-zA-Z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" minlength="2"  />
            </div>
          </div>
          
          <div class="form-group">
            <div class="col-sm-6" align="left">
              <input  name="password" type="password" required class="form-control" id="password" placeholder="Password" pattern="^[a-zA-Z0-9]+$" minlength="2" />
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-6" align="left">
              <input  name="adminName" type="text" required class="form-control" id="adminName" placeholder="ชื่อ-สกุล" />
            </div>
          </div>
          
          <div class="form-group">
            <div class="col-sm-3"> </div>
            <div class="col-sm-5" align="right">
              <button type="submit" class="btn btn-success btn-sm" id="btn"> <span class="glyphicon glyphicon-saved"></span> บันทึก  </button>      
            </div> 
          </div>
        </form>
</body>
</html>