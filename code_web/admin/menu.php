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
        <a href="menu.php?act=add" class="btn-info btn-sm"> เพิ่ม </a>
        <p></p>

        <?php
        $act = $_GET['act'];
        if($act == 'add'){
        include('menu_form_add.php');
        }elseif ($act == 'edit') {
        include('menu_form_edit.php');
        }
        else {
        include('menu_list.php');
        }
        ?>

      </div>
    </div>
  </div>
  </body>
</html>