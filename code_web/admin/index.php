<!DOCTYPE html>
<html>
<head>
<?php include('h.php');?>
<head>
<?php session_start();
  if (empty($_SESSION["staffId"]) ) { header("location: ../login_staff_index.php"); } 
?>
  <body>
    <div class="container">
  <?php include('navbar.php');?>
  <p></p>
    <div class="row">
      <div class="col-md-3">
        <!-- Left side column. contains the logo and sidebar -->
         <?php include('menu_left.php');?> 
        <!-- Content Wrapper. Contains page content -->
      </div>
    </div>
  </div>
</body>

</html>