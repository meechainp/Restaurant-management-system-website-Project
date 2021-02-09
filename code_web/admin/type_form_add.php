<?php include('h.php');?>
<form  name="type" action="type_form_add_db.php" method="POST" id="type" class="form-horizontal">

          <div class="form-group">
            <div class="col-sm-6" align="left">
            <p> รหัสประเภทของอาหาร </p>
              <input  name="typeId" type="text" required class="form-control" id="typeId" placeholder="รหัสประเภทของอาหาร" pattern="^[a-zA-Z0-9]+$" title="เช่น T01, T02" minlength="3"  />
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-6" align="left">
            <p> ชื่อประเภทของอาหาร </p>
              <input  name="typeName" type="text" required class="form-control" id="ชื่อประเภทของอาหาร" placeholder="ชื่อประเภทของอาหาร" minlength="1"  />
            </div>
          </div>
          
          
          <div class="form-group">
            <div class="col-sm-3"> </div>
            <div class="col-sm-5" align="right">
              <button type="submit" class="btn btn-success btn-sm" id="btn"> <span class="glyphicon glyphicon-saved"></span> บันทึก  </button>      
            </div> 
          </div>
        </form>