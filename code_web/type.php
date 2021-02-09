<!DOCTYPE html>
<html lang="en">
<?php
    $t_id = $_GET['t_id'];
    $t_name = $_GET['t_name'];
?>
<head>
  <?php include 'connect.php' ?>
  <?php include 'bar.php' ?>
  <?php $menu = $pdo->prepare("SELECT * FROM menu WHERE typeid = $t_id ");
        $menu->execute(); ?>
</head>


<!-- Page Content -->
<div class="container">

  <div class="row">

    <?php include 'menulist.html' ?>
    <!-- /.col-lg-3 -->

    <div class="col-lg-9">
      <div class="row">
        <br>
        <h1><?=$t_name?> Menu</h1>
        <br>
      </div>
      <div class="row">
        <?php while ($mre = $menu->fetch()) { ?>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="admin/menuimg/<?= $mre['menuImg'] ?>" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#"><?= $mre['menuTHname'] ?></a>
                </h4>
                <h5><?= $mre['menuPrice'] ?> Baht.</h5>
                <p class="card-text"><?= $mre['menuDesc'] ?>
                </p>
              </div>
              <div class="card-footer">
                <?php echo "<a href='cart.php?m_id=$mre[menuId]&act=add' class='btn btn-info' role='button'>เพิ่ม</a>"; ?>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.col-lg-9 -->
  </div>
  <!-- /.row -->
</div>
<!-- /.container -->
<!-- Footer -->
<footer class="py-5 bg-dark">
  <div class="container">
    <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
  </div>
  <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>