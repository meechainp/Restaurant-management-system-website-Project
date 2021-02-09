<!DOCTYPE html>
<html>
<head>
<?php include('h.php');
error_reporting( error_reporting() & ~E_NOTICE );
?>
<head>
  <body>
    <div class="container">
  <?php include('navbar.php');?>
  <p></p>
    <div class="row">
      <div class="col-md-3">
        <?php include('menu_left.php');?>   
      </div>

      <div class= "col-md-9">
        <a href="table.php?act=add" class="btn-info btn-sm"> เพิ่ม </a>
        <p></p>

        <?php
        $act = $_GET['act'];
        if($act == 'add'){
        include('table_form_add.php');
        }elseif ($act == 'edit') {
        include('table_form_edit.php');
        }
        else {
        include('table_list.php');
        }
        ?>

      </div>
    </div>
  </div>
  </body>
</html>